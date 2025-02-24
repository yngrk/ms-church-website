#
# Build the main php image to use
#
FROM --platform=linux/amd64 php:8.3-apache

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

RUN echo "upload_max_filesize = 50M" >> "$PHP_INI_DIR/php.ini" && \
    echo "post_max_size = 50M" >> "$PHP_INI_DIR/php.ini"

# Disable useless logging and enable modules
RUN sed 's/CustomLog/#CustomLog/' /etc/apache2/sites-enabled/000-default.conf && \
    a2enmod headers rewrite

# Install required packages
RUN apt update -y && \
    apt install -y git unzip libpng-dev libjpeg-dev libwebp-dev libicu-dev imagemagick

# Configure and install gd extension
RUN docker-php-ext-configure gd --with-jpeg --with-webp && \
    docker-php-ext-install gd

# Set working directory and copy contents
WORKDIR /var/www/html
COPY . .

# Set permissions
RUN chown -R www-data:www-data .

COPY --chmod=0755 ./start.sh /start.sh
ENTRYPOINT ["/start.sh"]

# Expose port 80
EXPOSE 80
