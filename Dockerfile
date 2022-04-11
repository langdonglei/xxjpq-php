FROM alpine:3.15
RUN apk add tzdata && cp /usr/share/zoneinfo/Asia/Shanghai /etc/localtime && echo Asia/Shanghai > /etc/timezone
RUN apk add ca-certificates
RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.tencent.com/g' /etc/apk/repositories \
    && apk add --update --no-cache \
    php8 \
    php8-json \
    php8-ctype \
	php8-exif \
    php8-fpm \
    php8-session \
    php8-pdo_mysql \
    php8-tokenizer \
    php8-curl \
    composer \
    nginx \
    && rm -f /var/cache/apk/*
WORKDIR /app
COPY .  /app
RUN cp /app/config_nginx /etc/nginx/http.d/default.conf && \
    cp /app/config_fpm /etc/php8/php-fpm.d/www.conf && \
    cp /app/config_php /etc/php8/php.ini && \
    mkdir -p /run/nginx && \
    mv /usr/sbin/php-fpm8 /usr/sbin/php-fpm && \
    composer install
EXPOSE 80
CMD ["sh", "run.sh"]
