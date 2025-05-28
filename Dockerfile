# Use official PHP with Apache
FROM php:8.2-apache

# Enable Apache mod_rewrite (commonly needed)
RUN a2enmod rewrite

# Copy app source to /var/www/html/
COPY . /var/www/html/

# Set correct permissions
RUN chown -R www-data:www-data /var/www/html

# Expose default port
EXPOSE 80
