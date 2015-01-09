FROM php:5.5.20-apache
RUN docker-php-ext-install mysqli
COPY config/php.ini /usr/local/etc/php/php.ini
COPY . /var/www/html
