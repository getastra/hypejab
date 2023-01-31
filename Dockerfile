FROM --platform=linux/amd64 php:fpm
RUN apt update -y && apt install -y git unzip
WORKDIR /app
COPY . /app
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
RUN composer i --no-dev
