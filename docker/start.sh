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

echo "=== Testando config Nginx ==="
nginx -t

echo "=== Iniciando Nginx ==="
nginx -g "daemon off;"
