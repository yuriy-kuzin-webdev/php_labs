FROM php:7.4-apache

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libxml2-dev \
    mysql-server \
    curl \
    git \
    unzip \
    supervisor

RUN docker-php-ext-install mysqli gd xml

RUN curl -o /tmp/phpmyadmin.tar.gz https://files.phpmyadmin.net/phpMyAdmin/5.1.4/phpMyAdmin-5.1.4-all-languages.tar.gz \
    && tar xvzf /tmp/phpmyadmin.tar.gz -C /var/www/html/ \
    && mv /var/www/html/phpMyAdmin-5.1.4-all-languages /var/www/html/phpmyadmin \
    && rm /tmp/phpmyadmin.tar.gz

RUN service mysql start && mysql -e "CREATE DATABASE library"

COPY ./init.sql /docker-entrypoint-initdb.d/

COPY ./src/ /var/www/html/

COPY supervisord.conf /etc/supervisord.conf

EXPOSE 80 3306

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
