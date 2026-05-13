FROM node:22-alpine AS assets

WORKDIR /app

COPY package*.json ./
RUN npm ci

COPY . .
RUN npm run build

FROM richarvey/nginx-php-fpm:latest

COPY . /var/www/html

WORKDIR /var/www/html

RUN composer install --no-dev --optimize-autoloader

COPY --from=assets /app/public/build /var/www/html/public/build

RUN mkdir -p storage/framework/cache/data storage/framework/sessions storage/framework/views storage/logs bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

EXPOSE 80
