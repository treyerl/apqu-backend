FROM php:8.2-fpm

RUN apt update \
    && apt install -y libicu-dev libzip-dev zip git libpng-dev g++\
    && docker-php-ext-install intl opcache pdo pdo_mysql \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip \
    && docker-php-ext-install gd \
    && curl -sS https://getcomposer.org/installer \
     | php -- --install-dir=/usr/local/bin --filename=composer \
    && curl -sS https://get.symfony.com/cli/installer | bash \
    && mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

RUN echo "alias con='php bin/console'" > ~/.bashrc

WORKDIR /var/www/app
