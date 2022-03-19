FROM nginx:latest

WORKDIR /var/www

RUN usermod -u 1000 www-data

COPY ./docker/nginx/conf.d/* /etc/nginx/conf.d
COPY ./docker/nginx/nginx.conf /etc/nginx
COPY ./server /var/www/server

EXPOSE 80
EXPOSE 443