FROM php:5.6-apache
RUN apt-get update & apt-get upgrade -y
RUN docker-php-ext-install pdo pdo_mysql mysqli mysql
RUN a2enmod rewrite
COPY php.ini /usr/local/etc/php/ 