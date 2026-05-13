FROM richarvey/nginx-php-fpm:latest

# install node + npm
RUN apt-get update && apt-get install -y nodejs npm

COPY . /var/www/html

WORKDIR /var/www/html

RUN composer install --no-dev --optimize-autoloader

RUN npm install
RUN npm run build

RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

EXPOSE 80