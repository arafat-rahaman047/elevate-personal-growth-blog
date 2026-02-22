# Use official PHP with Apache
FROM php:8.2-apache

# Copy all project files into the container
COPY . /var/www/html/

# Enable Apache rewrite module (important for clean URLs)
RUN a2enmod rewrite

# Expose port 80 for web traffic
EXPOSE 80
