# Usa la imagen oficial de PHP con Apache
FROM php:8.1-apache

# Instala extensiones de PHP necesarias para CodeIgniter
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Habilita el mod_rewrite de Apache
RUN a2enmod rewrite

# Establece el directorio de trabajo dentro del contenedor
WORKDIR /var/www/html

# Copia el contenido de tu aplicación dentro del contenedor
COPY . .

# Da permisos de escritura a la carpeta writable
RUN chmod -R 777 /var/www/html/writable

# Expon el puerto 80 para el servidor web
EXPOSE 80
