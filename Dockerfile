# Use an official PHP image with Apache (or Nginx if you prefer)
# This uses Alpine Linux, which is lightweight
FROM php:8.2-apache-alpine

# Set the working directory in the container
WORKDIR /var/www/html

# Copy your PHP application files into the container
# Ensure your index.php and capture.php are directly in the backend folder
COPY . /var/www/html

# Expose port 80 (default for HTTP)
EXPOSE 80

# The default command for php:apache images is to start Apache
# CMD ["apache2-foreground"]
