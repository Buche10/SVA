#!/bin/sh
set -e

FPM_CONF=/usr/local/etc/php-fpm.d/zz-app.conf

# php-fpm no interpola variables de entorno en su config: se sustituye aquí.
if [ -n "${PHP_FPM_MAX_CHILDREN}" ]; then
    sed -i "s/^pm.max_children = .*/pm.max_children = ${PHP_FPM_MAX_CHILDREN}/" "$FPM_CONF"
    echo "[entrypoint] php-fpm: pm=static, max_children=${PHP_FPM_MAX_CHILDREN}"
fi

# storage/ y bootstrap/cache tienen que ser escribibles pase lo que pase.
mkdir -p storage/framework/sessions storage/framework/views storage/framework/cache storage/logs bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache 2>/dev/null || true

# Cachés de Laravel: en ARRANQUE (dependen de las variables que inyecta Coolify).
# route:cache queda fuera a propósito: routes/web.php puede tener closures.
php artisan config:cache
php artisan view:cache
php artisan storage:link 2>/dev/null || true

# Migraciones: este sitio corre en UN solo contenedor web, así que migrar aquí es
# seguro (no compiten varios) y garantiza que la BD queda al día en cada deploy.
if [ "$1" = "supervisord" ]; then
    php artisan migrate --force || echo "[entrypoint] migrate falló (¿BD no lista aún?), continúo"
    php-fpm -t
fi

exec "$@"
