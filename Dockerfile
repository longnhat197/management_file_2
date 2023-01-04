FROM alpine:latest

ENV \
  APP_DIR="/app" \
  APP_PORT="8000"

WORKDIR $APP_DIR
COPY . $APP_DIR
COPY .env.example $APP_DIR/.env


# Essentials
RUN echo "UTC" > /etc/timezone
RUN apk add --no-cache zip unzip curl
# Installing bash
RUN apk add bash
RUN sed -i 's/bin\/ash/bin\/bash/g' /etc/passwd

# Installing PHP
# RUN apk add --no-cache php7.4 \
#     php7.4-common \
#     php7.4-fpm \
#     php7.4-pdo \
#     php7.4-opcache \
#     php7.4-zip \
#     php7.4-phar \
#     php7.4-iconv \
#     php7.4-cli \
#     php7.4-curl \
#     php7.4-openssl \
#     php7.4-mbstring \
#     php7.4-tokenizer \
#     php7.4-fileinfo \
#     php7.4-json \
#     php7.4-xml \
#     php7.4-xmlwriter \
#     php7.4-simplexml \
#     php7.4-dom \
#     php7.4-pdo_mysql \
#     php7.4-pdo_sqlite \
#     php7.4-tokenizer

# Installing composer
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN rm -rf composer-setup.php

RUN composer install
# generate an APP_KEY
RUN php artisan key:generate

CMD php artisan serve --host=0.0.0.0 --port=$APP_PORT
