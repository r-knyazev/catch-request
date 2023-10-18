FROM php:8.2-fpm-alpine

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apk add --no-cache zip libzip-dev
RUN docker-php-ext-configure zip
RUN docker-php-ext-install zip
