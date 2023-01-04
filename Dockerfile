FROM php:7.4-apache

# COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
# COPY start-apache /usr/local/bin
# RUN a2enmod rewrite
ENV \
  APP_DIR="/app" \
  APP_PORT="8000"
# # Copy application source
# COPY src /var/www/
# RUN chown -R www-data:www-data /var/www
WORKDIR $APP_DIR
COPY . $APP_DIR
COPY .env.example $APP_DIR/.env

# Essentials
RUN echo "UTC" > /etc/timezone
RUN apk add --no-cache zip unzip curl
# Installing bash
RUN apk add bash
RUN sed -i 's/bin\/ash/bin\/bash/g' /etc/passwd


# Installing composer
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN rm -rf composer-setup.php

RUN composer install
# generate an APP_KEY
RUN php artisan key:generate

CMD php artisan serve --host=0.0.0.0 --port=$APP_PORT

# EXPOSE 9093


