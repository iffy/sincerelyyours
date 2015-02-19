FROM php:5.5.20-apache
RUN apt-get update
RUN apt-get install -y libmysqlclient-dev
RUN docker-php-ext-configure mysqli --with-mysqli=/usr/bin/mysql_config
RUN docker-php-ext-install mysqli

# image directory
RUN mkdir /var/www/images
RUN chown www-data:www-data /var/www/images
RUN echo "Alias /images /var/www/images" >> /etc/apache2/apache2.conf

COPY config/php.ini /usr/local/etc/php/php.ini
