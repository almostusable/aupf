FROM node:latest AS node_step
FROM php:8.2-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-enable  mysqli pdo pdo_mysql

RUN apt-get update && \
apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev libzip-dev zip git curl && \
docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ && \
docker-php-ext-install gd zip

RUN apt-get -y install exiftool
RUN docker-php-ext-configure exif
RUN docker-php-ext-install exif
RUN docker-php-ext-enable exif

RUN apt-get install -y libicu-dev
RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl
RUN docker-php-ext-enable intl

COPY --from=node /usr/local/lib/node_modules /usr/local/lib/node_modules
COPY --from=node /usr/local/bin/node /usr/local/bin/node
RUN ln -s /usr/local/lib/node_modules/npm/bin/npm-cli.js /usr/local/bin/npm
RUN npm install -g yarn gulp


RUN curl -sS https://getcomposer.org/installer | \
    php -- --install-dir=/usr/bin/ --filename=composer

RUN a2enmod rewrite &&\
    a2enmod headers &&\
    service apache2 restart

# Závislosti pro php-amqp
RUN apt-get install -y librabbitmq-dev

# Instalace rozšíření amqp přes PECL
RUN pecl install amqp && \
    docker-php-ext-enable amqp

# Install yaml extension dependencies and extension
RUN apt-get install -y libyaml-dev && \
    pecl install yaml && \
    docker-php-ext-enable yaml