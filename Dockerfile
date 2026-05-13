FROM richarvey/nginx-php-fpm:latest

# install Node 22 (official Alpine package)
RUN apk add --no-cache nodejs npm

COPY . /var/www/html

WORKDIR /var/www/html

RUN composer install --no-dev --optimize-autoloader

RUN rm -rf node_modules package-lock.json
RUN npm install
RUN npm run build

RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

EXPOSE 80