# Use the official PHP image with Apache
FROM php:8.3-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git zip unzip sqlite3 libsqlite3-dev libpq-dev libonig-dev libzip-dev && \
    docker-php-ext-install pdo pdo_mysql pdo_sqlite mbstring zip exif pcntl bcmath


# Enable Apache rewrite module
RUN a2enmod rewrite

# Copy existing application code
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Set permissions for Laravel storage
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache



# Make database folder and file
RUN mkdir -p database && touch database/database.sqlite \
    && chown -R www-data:www-data database \
    && chmod -R 775 database

RUN mkdir -p /var/www/html/public/images \
&& chown -R www-data:www-data /var/www/html/public/images \
&& chmod -R 775 /var/www/html/public/images

# Expose port 80
EXPOSE 80

# Set Apache document root to Laravel's public folder
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Build frontend assets
#latest commit
# RUN npm ci && npm run build

# Start Apache server
#Storage link no commit::congig clear && cache clear
CMD php artisan migrate --force && rm -f public/storage || true && php artisan storage:link && apache2-foreground

