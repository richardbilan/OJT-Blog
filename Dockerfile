FROM richarvey/nginx-php-fpm:latest

# install Node 22
RUN apk add --no-cache curl \
    && curl -fsSL https://unofficial-builds.nodejs.org/download/release/v22.12.0/node-v22.12.0-linux-x64-musl.tar.xz \
    -o node.tar.xz \
    && tar -xJf node.tar.xz -C /usr/local --strip-components=1 \
    && rm node.tar.xz

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