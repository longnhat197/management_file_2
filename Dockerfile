FROM alpine:3.14 as builders

ENV \
    APP_DIR="/app" \
    APP_PORT="8000"

WORKDIR $APP_DIR
COPY . $APP_DIR
COPY .env.example $APP_DIR/.env


# Essentials
RUN echo "UTC" > /etc/timezone
RUN apk add --no-cache zip unzip curl
# RUN apk add --update nodejs npm
# Installing bash
RUN apk add bash
RUN sed -i 's/bin\/ash/bin\/bash/g' /etc/passwd

# Installing PHP
RUN apk add --no-cache php7 \
    php7-amqp \
    php7-dev \
    php7-common \
    php7-apcu \
    php7-gd \
    php7-xmlreader \
    php7-bcmath \
    php7-ctype \
    php7-curl \
    php7-exif \
    php7-iconv \
    php7-intl \
    php7-json \
    php7-mbstring \
    php7-opcache \
    php7-openssl \
    php7-pcntl \
    php7-pdo \
    php7-mysqlnd \
    php7-pdo_mysql \
    php7-pdo_pgsql \
    php7-phar \
    php7-posix \
    php7-session \
    php7-xml \
    php7-xmlwriter \
    php7-simplexml \
    php7-xsl \
    php7-zip \
    php7-zlib \
    php7-dom \
    php7-redis \
    php7-fpm \
    php7-sodium \
    php7-ldap \
    php7-fileinfo \
    php7-tokenizer

    # Installing npm install
    # RUN npm install

    # Installing composer
    RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --version=1.7.3 --install-dir=/usr/local/bin --filename=composer
RUN rm -rf composer-setup.php

RUN composer install
# generate an APP_KEY
RUN php artisan key:generate

CMD php artisan serve
