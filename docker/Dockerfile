FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN useradd -G www-data,root -u 1000 -d /home/api api
RUN mkdir -p /home/api && chown -R api:api /home/api

USER api

WORKDIR /var/www/html

CMD ["php-fpm"]
