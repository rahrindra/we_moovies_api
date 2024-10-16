# Étape 1 : Utiliser une image de base PHP avec extensions nécessaires
FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libonig-dev \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo pdo_mysql zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install

RUN php bin/console lexik:jwt:generate-keypair --no-interaction --overwrite

RUN chown -R www-data:www-data /var/www

EXPOSE 9000

CMD ["php-fpm"]
