FROM php:8.2-fpm

# General packages installation
RUN apt update && apt install -y libfreetype-dev libjpeg62-turbo-dev libpng-dev zlib1g-dev libzip-dev unzip
RUN docker-php-ext-configure gd --with-freetype --with-jpeg 
RUN docker-php-ext-install -j$(nproc) gd
RUN docker-php-ext-install zip

# Install node
RUN curl -fsSL https://deb.nodesource.com/setup_21.x | bash - && apt-get install -y nodejs

# Set working directory and copy files
WORKDIR /var/www/alrobale
COPY . .

# Set storage dicrectory permissions
RUN chown -R www-data:www-data /var/www/alrobale && chmod -R 775 /var/www/alrobale/storage

# Install and run composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install

# Install node packages
RUN npm i
RUN npm run build

# Run php-fpm
CMD ["php-fpm"]
