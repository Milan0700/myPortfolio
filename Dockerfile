# Stage 1 — build frontend
FROM node:20 AS nodebuilder

WORKDIR /app

COPY package*.json ./
RUN npm install

COPY . .
RUN npm run build


# Stage 2 — php + nginx
FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libzip-dev \
    nginx

RUN docker-php-ext-install zip

WORKDIR /var/www

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install --no-dev --optimize-autoloader

# copy built frontend assets
COPY --from=nodebuilder /app/public/build /var/www/public/build

COPY nginx/default.conf /etc/nginx/conf.d/default.conf

RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 10000

CMD service nginx start && php-fpm