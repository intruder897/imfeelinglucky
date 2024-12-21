FROM php:8.2-fpm-alpine

RUN apk update && apk add --no-cache \
    bash \
    autoconf \
    gcc \
    g++ \
    make \
    libc-dev \
    libzip-dev \
    curl-dev \
    zip \
    git \
    && pecl install redis \
    && docker-php-ext-install pdo pdo_mysql

RUN echo "extension=redis.so" > /usr/local/etc/php/conf.d/redis.ini

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --optimize-autoloader

RUN mkdir -p /var/www/html/storage/logs
RUN touch /var/www/html/storage/logs/laravel.log

RUN chown -R www-data: /var/www/html

EXPOSE 9000

CMD ["php-fpm"]
