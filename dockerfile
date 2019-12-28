FROM php:7.3-apache

#Install git
RUN apt-get update \
    && apt-get install -y git \
    && apt-get install zip unzip
RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN a2enmod rewrite

#Install Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --install-dir=. --filename=composer
RUN mv composer /usr/local/bin/
COPY . /var/www/html/

WORKDIR /var/www/html/

RUN composer install
EXPOSE 80

RUN chmod +x ./db_health_check.sh
CMD ["make", "run"]
