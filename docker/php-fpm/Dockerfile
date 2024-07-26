FROM php:8.3-fpm

RUN ["apt-get", "update"]
RUN ["apt-get", "install", "-y", "nano"]

WORKDIR /var/www/html

COPY . .

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN docker-php-ext-install pdo pdo_mysql