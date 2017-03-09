FROM ubuntu:16.04

ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update && \
apt-get install -y curl git unzip php libapache2-mod-php php-mbstring \
php-fpm php-cli php-mysqlnd php-pgsql php-sqlite3 php-redis php-xml \
php-apcu php-intl php-imagick php-mcrypt php-json php-gd php-curl && \
phpenmod mcrypt mbstring && \
rm -rf /var/lib/apt/lists/* && \
cd /tmp && curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer