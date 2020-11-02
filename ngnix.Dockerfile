FROM nginx:stable-alpine

ADD ./nginx/nginx.conf /etc/nginx/nginx.conf
ADD ./nginx/default.conf /etc/nginx/conf.d/default.conf

RUN mkdir -p /var/www/html

RUN addgroup -g 1000 loyal && adduser -G loyal -g loyal -s /bin/sh -D laravel

RUN chown loyal:loyal /var/www/html