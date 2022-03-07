FROM php:8.0-fpm

# Set working directory
WORKDIR /var/www

# Install xdebug for development
RUN pecl install xdebug && docker-php-ext-enable xdebug

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Expose port 9000 and start php-fpm server
EXPOSE 9000

# clean
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www
