FROM php:8.1.0-fpm

RUN apt-get update && \
    apt-get install -y libzip-dev zip unzip && \
    docker-php-ext-install pdo_mysql zip && \
    pecl install xdebug && \
    docker-php-ext-enable xdebug

WORKDIR /var/www/html

COPY . /var/www/html

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

CMD php artisan serve --host=0.0.0.0 --port=8000