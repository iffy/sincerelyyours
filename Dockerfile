FROM php:5.6-apache
COPY config/php.ini /usr/local/etc/php/php.ini
COPY . /var/www/html
