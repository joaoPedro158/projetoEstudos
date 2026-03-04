#!/bin/bash
set -e

echo "=== Iniciando PHP-FPM ==="
php-fpm -D

echo "=== Aguardando PHP-FPM na porta 9000 ==="
for i in $(seq 1 15); do
    if nc -z 127.0.0.1 9000; then
        echo "PHP-FPM pronto!"
        break
    fi
    echo "Tentativa $i..."
    sleep 1
done

echo "=== Rodando artisan ==="
cd /var/www
php artisan migrate --force
php artisan config:cache
php artisan route:cache

echo "=== Permissões ==="
chmod -R 775 /var/www/storage /var/www/bootstrap/cache
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

echo "=== Verificando APP_KEY ==="
php artisan env | grep APP_KEY || echo "APP_KEY NAO ENCONTRADA"

echo "=== Log de erros do Laravel ==="
tail -n 20 /var/www/storage/logs/laravel.log 2>/dev/null || echo "Sem log ainda"

echo "=== Testando config Nginx ==="
nginx -t

echo "=== Iniciando Nginx ==="
nginx -g "daemon off;"
