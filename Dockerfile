FROM php:7.4-apache

# COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
# COPY start-apache /usr/local/bin
# RUN a2enmod rewrite

# # Copy application source
# COPY src /var/www/
# RUN chown -R www-data:www-data /var/www
COPY . /usr/src/myapp
WORKDIR /usr/src/myapp

CMD [ "php", "./server.php" ]

EXPOSE 9093

