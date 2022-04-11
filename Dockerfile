FROM alpine:3.13
RUN apk add tzdata && cp /usr/share/zoneinfo/Asia/Shanghai /etc/localtime && echo Asia/Shanghai > /etc/timezone
RUN apk add ca-certificates
RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.tencent.com/g' /etc/apk/repositories \
    && apk add --update --no-cache \
    php7 \
    php7-json \
    php7-ctype \
	php7-exif \
    php7-fpm \
    php7-session \
    php7-pdo_mysql \
    php7-tokenizer \
    php7-curl \
    composer \
    nginx \
    && rm -f /var/cache/apk/*
WORKDIR /app
COPY .  /app
RUN cp /app/config_nginx /etc/nginx/conf.d/default.conf && \
    cp /app/config_fpm /etc/php7/php-fpm.d/www.conf && \
    cp /app/config_php /etc/php7/php.ini && \
    mkdir -p /run/nginx && \
    mv /usr/sbin/php-fpm7 /usr/sbin/php-fpm && \
    composer install
EXPOSE 80
CMD ["sh", "run.sh"]
