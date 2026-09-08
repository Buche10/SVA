# =============================================================================
# Santamaría Velasco & Asociados — imagen de producción (web)
# nginx + php-fpm (Postgres). Multi-stage: composer, build de Vite, imagen final.
# =============================================================================

# --- Base común: PHP + extensiones -------------------------------------------
FROM php:8.2-fpm-alpine AS php-base

# pdo_pgsql → la base de producción es Postgres.
# intl/bcmath → utilidades comunes de Laravel. opcache → rendimiento.
RUN apk add --no-cache icu-dev postgresql-dev $PHPIZE_DEPS \
    && docker-php-ext-install -j$(nproc) pdo_pgsql intl bcmath opcache \
    && apk del $PHPIZE_DEPS \
    && rm -rf /tmp/pear

WORKDIR /app

# --- Etapa 1: dependencias de PHP -------------------------------------------
FROM php-base AS vendor

RUN apk add --no-cache git unzip
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist --no-interaction

# --- Etapa 2: assets del frontend -------------------------------------------
FROM node:20-alpine AS assets

WORKDIR /app
COPY package.json package-lock.json ./
RUN npm ci
COPY resources ./resources
COPY vite.config.js tailwind.config.js postcss.config.js jsconfig.json ./
# El build necesita vendor/ (app.js importa Ziggy desde vendor/tightenco/ziggy y
# Tailwind escanea las vistas de paginación de Laravel dentro de vendor/).
COPY --from=vendor /app/vendor ./vendor
RUN npm run build

# --- Etapa 3: imagen final ---------------------------------------------------
FROM php-base

RUN apk add --no-cache nginx supervisor

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
COPY --from=vendor /app/vendor ./vendor
COPY . .
COPY --from=assets /app/public/build ./public/build

RUN composer dump-autoload --optimize --no-dev --classmap-authoritative \
    && rm -f /usr/bin/composer \
    && mkdir -p storage/framework/sessions storage/framework/views storage/framework/cache storage/logs bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY docker/php-fpm.conf /usr/local/etc/php-fpm.d/zz-app.conf
COPY docker/php.ini /usr/local/etc/php/conf.d/zz-app.ini
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY docker/entrypoint.sh /usr/local/bin/entrypoint
RUN chmod +x /usr/local/bin/entrypoint

EXPOSE 80

ENTRYPOINT ["entrypoint"]
CMD ["supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf", "-n"]
