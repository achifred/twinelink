FROM php:7.4-fpm-alpine

ADD ./php/www.conf /usr/local/etc/php-fpm.d/www.conf

RUN addgroup -g 1000 loyal && adduser -G loyal -g loyal -s /bin/sh -D laravel

RUN mkdir -p /var/www/html

RUN chown loyal:loyal /var/www/html

WORKDIR /var/www/html

RUN docker-php-ext-install pdo pdo_mysql