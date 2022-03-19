FROM php:7.4-fpm

WORKDIR /var/www

RUN apt-get update
RUN apt-get install -y \
    apt-transport-https \
    build-essential \
    libzip-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    unzip \
    curl \
    nano \
    cron \
    supervisor \
    rsyslog \
    sudo \
    dos2unix \
    procps \
    ffmpeg

RUN docker-php-ext-install zip exif pcntl
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install -j$(nproc) gd
#RUN docker-php-ext-install opcache

RUN touch /var/log/supervisord.log

COPY ./docker/server/supervisor/supervisord.conf /etc/supervisor
COPY ./docker/server/supervisor/conf.d/* /etc/supervisor/conf.d/
COPY ./docker/server/php.ini /usr/local/etc/php

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN usermod -u 1000 www-data

COPY ./ /var/www/


EXPOSE 9000

ENTRYPOINT ["/usr/bin/supervisord","-nc", "/etc/supervisor/supervisord.conf"]
