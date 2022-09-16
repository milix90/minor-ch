FROM php:8.0

RUN apt-get update -y && apt-get install -y openssl zip unzip git curl
RUN docker-php-ext-install pdo pdo_mysql
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY src/client .

RUN chown -R www-data:www-data /app

RUN cp .env.example .env
RUN composer install

CMD php artisan serve --host=0.0.0.0 --port=8055
EXPOSE 8055