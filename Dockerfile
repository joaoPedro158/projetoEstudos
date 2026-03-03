FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip nginx

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install --optimize-autoloader --no-dev

RUN npm install && npm run build

RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# ✅ Garante que php-fpm escuta na porta 9000
RUN echo '[www]' > /usr/local/etc/php-fpm.d/zz-docker.conf && \
    echo 'listen = 127.0.0.1:9000' >> /usr/local/etc/php-fpm.d/zz-docker.conf

COPY docker/nginx.conf /etc/nginx/sites-available/default

EXPOSE 8080

CMD php artisan config:cache && \
    php artisan route:cache && \
    php artisan migrate --force && \
    php-fpm -D && \
    nginx -g "daemon off;"
