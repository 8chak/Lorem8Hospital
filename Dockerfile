# Use official PHP 8.3 with Apache
FROM php:8.3-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    sqlite3 \
    libsqlite3-dev \
    libonig-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_sqlite mbstring zip exif pcntl bcmath

# Enable Apache rewrite module (needed for Laravel routing)
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy the project files into the container
COPY . .

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Set proper permissions for Laravel folders
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Set Apache DocumentRoot to Laravel's public folder
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Make sure the SQLite database file exists
RUN mkdir -p database && touch database/database.sqlite && chown -R www-data:www-data database

# Expose port 80
EXPOSE 80

# Start Laravel migrations then Apache
CMD php artisan migrate --force && apache2-foreground
