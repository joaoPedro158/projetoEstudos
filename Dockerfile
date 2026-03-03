FROM php:8.2-fpm

# 1. Instala dependências do sistema + Node.js
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip nginx \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# 2. Instala extensões PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# 3. Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 4. Define o diretório de trabalho
WORKDIR /var/www

# 5. COPIA OS ARQUIVOS PRIMEIRO (Essencial para o npm e composer funcionarem)
COPY . .

# 6. Instala dependências PHP
RUN composer install --optimize-autoloader --no-dev

# 7. Agora sim, instala dependências JS e faz o build (O arquivo package.json já existe aqui)
RUN npm install && npm run build

# 8. Ajusta permissões
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# 9. Configura Nginx
COPY docker/nginx.conf /etc/nginx/sites-available/default

EXPOSE 8080

# 10. Inicialização
CMD php artisan config:cache && \
    php artisan route:cache && \
    php artisan migrate --force && \
    php-fpm -D && \
    nginx -g "daemon off;"
