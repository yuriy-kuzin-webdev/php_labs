FROM alpine:latest

RUN apk update && apk add --no-cache apache2 php7 php7-mysqli mysql mysql-client phpmyadmin supervisor bash

RUN sed -i 's/#LoadModule rewrite_module/LoadModule rewrite_module/' /etc/apache2/httpd.conf

RUN mkdir -p /etc/phpmyadmin && \
    ln -s /usr/share/webapps/phpmyadmin /var/www/localhost/htdocs/phpmyadmin && \
    cp /usr/share/webapps/phpmyadmin/config.sample.inc.php /usr/share/webapps/phpmyadmin/config.inc.php

RUN mkdir -p /run/mysqld && \
    chown -R mysql:mysql /run/mysqld

COPY ./src/ /var/www/localhost/htdocs/

COPY supervisord.conf /etc/supervisord.conf

EXPOSE 80 3306

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
