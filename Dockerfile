FROM php:8.3-apache

# Устанавливаем нужные зависимости
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip \
    && docker-php-ext-install zip pdo pdo_mysql

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Копируем Yii2 приложение в Apache root
COPY ./yii2app /var/www/html/

RUN chmod -R 777 /var/www/html/runtime /var/www/html/web/assets

RUN composer install --no-interaction

# Настройка прав и включение mod_rewrite
RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite

RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/web|' /etc/apache2/sites-available/000-default.conf

# Открываем порт 80 внутри контейнера
EXPOSE 80

