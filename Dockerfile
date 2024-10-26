# Usa una imagen base de PHP con Apache
FROM php:8.1-apache

# Habilita las extensiones necesarias para MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Establece el directorio de trabajo dentro del contenedor
WORKDIR /var/www/html

# Copia el contenido de tu aplicación dentro del contenedor (incluyendo vendor)
COPY . .

# Habilita mod_rewrite de Apache
RUN a2enmod rewrite

# Copia el archivo de configuración de Apache
COPY ./.docker/vhost.conf /etc/apache2/sites-available/000-default.conf

# Da permisos a la carpeta writable
RUN chmod -R 777 /var/www/html/writable

# Expon el puerto 80
EXPOSE 80
