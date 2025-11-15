# Empezamos desde la imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instalamos la extensión para conectar con MySQL
# También instalamos mysqli
RUN docker-php-ext-install pdo_mysql mysqli
RUN a2enmod rewrite
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/sites-available/000-default.conf