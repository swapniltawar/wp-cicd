FROM php:7.4-fpm

# Replace shell with bash so we can source files
RUN rm /bin/sh && ln -s /bin/bash /bin/sh

# make sure apt is up to date
RUN apt-get update --fix-missing
RUN apt-get install -y build-essential curl zip git libssl-dev zlib1g-dev libpng-dev libjpeg-dev libfreetype6-dev graphicsmagick  libgraphicsmagick1-dev

RUN pear config-set preferred_state alpha
RUN pecl install gmagick
RUN docker-php-ext-install pdo_mysql mysqli
RUN docker-php-ext-enable pdo_mysql mysqli gmagick

RUN docker-php-ext-configure gd --with-freetype --with-jpeg && docker-php-ext-install gd

COPY ./php.ini /usr/local/etc/php/php.ini
COPY ./wp-cli.phar /usr/local/bin/wp
