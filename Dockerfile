FROM node:20 AS nodebuilder
WORKDIR /app

COPY package*.json ./
RUN npm install

COPY . .
RUN npm run build

FROM php:8.4-fpm

RUN apt-get update && apt-get install -y nginx

WORKDIR /var/www

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
COPY . .

RUN composer install --no-dev --optimize-autoloader

COPY --from=nodebuilder /app/public/build /var/www/public/build

COPY nginx/default.conf /etc/nginx/sites-enabled/default

RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 10000

CMD service nginx start && php-fpm