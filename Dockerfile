FROM --platform=linux/amd64 composer:2.5.8 as composer
FROM --platform=linux/amd64 php:fpm-alpine3.18
COPY --from=composer /usr/bin/composer /usr/local/bin/composer
WORKDIR /app
COPY composer.json ./composer.json
COPY composer.lock ./composer.lock
RUN composer i --no-dev
COPY . /app
