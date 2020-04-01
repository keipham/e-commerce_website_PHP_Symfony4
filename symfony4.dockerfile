FROM whatwedo/symfony4:v2.0

MAINTAINER Kei Pham-Quang

COPY . /var/www
WORKDIR /var/www 

RUN composer install && composer update