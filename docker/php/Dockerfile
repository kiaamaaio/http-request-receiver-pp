FROM php:8.3.8-fpm
COPY php.ini /usr/local/etc/php/
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer
