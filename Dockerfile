# Use an official PHP image as a base
FROM php:8.2-fpm

# Set the working directory inside the container
WORKDIR /var/www/html

# Install required system dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install zip pdo pdo_mysql

# Install MongoDB extension
RUN pecl install mongodb \
    && docker-php-ext-enable mongodb

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set Composer to allow superuser permissions
ENV COMPOSER_ALLOW_SUPERUSER=1

# Copy composer files and install dependencies
COPY composer.json composer.lock ./
RUN composer install --no-scripts --no-autoloader

# Copy the Laravel application files into the container
COPY . .

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

RUN composer dump-autoload

# Update Composer dependencies
RUN composer update

# Enable MongoDB extension in php.ini
RUN echo "extension=mongodb.so" | tee -a /usr/local/etc/php/php.ini

# Install Laravel MongoDB package
# RUN composer require mongodb/mongodb
# RUN composer require mongodb/laravel-mongodb:^4.2

# RUN php artisan key:generate

# Set the command to run the Laravel application
CMD php artisan serve --host=0.0.0.0 --port=8000
