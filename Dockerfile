# Use an official PHP Apache image with PHP 8.1
FROM php:8.1-apache

# Install the PDO MySQL extension for database connectivity
RUN docker-php-ext-install pdo pdo_mysql

# Enable Apache's mod_rewrite module (good practice for PHP apps)
RUN a2enmod rewrite

# Set the working directory to the Apache document root
WORKDIR /var/www/html

# Copy all your project files into the container
COPY . /var/www/html/

# Ensure the web server runs on port 80
EXPOSE 80
