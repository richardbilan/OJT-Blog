FROM node:22-alpine AS assets

WORKDIR /app

COPY package*.json ./
RUN npm ci

COPY . .
RUN npm run build

FROM richarvey/nginx-php-fpm:latest

ENV SKIP_COMPOSER=1
ENV WEBROOT=/var/www/html/public
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV APP_URL=https://richardbilanojt-blog.onrender.com
ENV PHP_ERRORS_STDERR=1
ENV LOG_CHANNEL=stderr
ENV COMPOSER_ALLOW_SUPERUSER=1
ENV SESSION_DRIVER=file
ENV CACHE_STORE=file
ENV QUEUE_CONNECTION=sync
ENV APP_MAINTENANCE_STORE=file

COPY . /var/www/html

WORKDIR /var/www/html

COPY nginx-site.conf /etc/nginx/sites-enabled/default.conf

RUN rm -f bootstrap/cache/*.php bootstrap/cache/*.tmp

RUN composer install --no-dev --optimize-autoloader

COPY --from=assets /app/public/build /var/www/html/public/build

RUN mkdir -p storage/framework/cache/data storage/framework/sessions storage/framework/views storage/logs bootstrap/cache

RUN php artisan view:cache

RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 80
