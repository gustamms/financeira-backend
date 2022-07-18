FROM php:8.0.2-alpine

ARG APP_STAGE

ENV APP_STAGE=$APP_STAGE

# Kafka
ENV PECL_RBKAFKA_VERSION='5.0.0'

RUN apk add autoconf
RUN apk add build-base
RUN apk add bash
RUN apk add curl

RUN apk add --update --no-cache \
    librdkafka-dev \
    && rm -rf /var/cache/apk/* \
    && pecl install rdkafka \
    && docker-php-ext-enable rdkafka

# Instala o módulo do redis no php
RUN pecl install redis && docker-php-ext-enable redis

# Instala o modulo mongodb do php
# RUN pecl install mongodb && docker-php-ext-enable mongodb

# Instala o módulo do mysqli
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql

# INSTALL COMPOSER
RUN curl -s https://getcomposer.org/installer | php
RUN alias composer='php composer.phar'
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /app

COPY ./composer.* ./

# RUN composer install --no-scripts --prefer-dist --no-autoloader;

RUN apk add git

RUN echo "disable_functions = phpinfo" >> /usr/local/etc/php/php.ini

COPY / /app

# RUN composer dump-autoload --optimize --no-scripts
