FROM devilbox/php-fpm-8.0:latest
MAINTAINER Anderson Lucas
WORKDIR /var/www
COPY . /var/www
RUN chmod -Rf 777 .
ENTRYPOINT php -S 0.0.0.0:8080 -t public
EXPOSE 8080