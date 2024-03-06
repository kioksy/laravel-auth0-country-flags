# Use the official PHP image with PHP 8.3
FROM php:8.3-fpm

# Install system dependencies for PHP and Laravel
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    vim

# Install PHP extensions required by Laravel
RUN docker-php-ext-install pdo pdo_mysql zip exif pcntl

# Install Node.js 18.x and npm
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs

# Confirm Node and npm are installed
RUN node --version && npm --version

# Install Composer globally
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set the working directory in the container to /var/www
WORKDIR /var/www

# Copy the application code to the container
COPY . .

# Install Composer dependencies
RUN composer install --optimize-autoloader --no-dev

# Install npm dependencies for Vite and run build
RUN npm install && npm run build

# Expose the port PHP-FPM is reachable on
EXPOSE 9000

# Start the PHP-FPM server
CMD ["php-fpm"]
