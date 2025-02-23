#
# Build the main php image to use
#
FROM --platform=linux/amd64 php:8.3-apache

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

RUN echo "upload_max_filesize = 50M" >> "$PHP_INI_DIR/php.ini" && \
    echo "post_max_size = 50M" >> "$PHP_INI_DIR/php.ini"


# Disable useless logging
RUN sed 's/CustomLog/#CustomLog/' /etc/apache2/sites-enabled/000-default.conf
RUN a2enmod headers rewrite

# Install image processing packages
RUN apt update -y  \
    && apt install -y git unzip \
    && apt install -y libpng-dev  \
    && apt install -y libjpeg-dev  \
    && apt install -y libwebp-dev  \
    && apt install -y libicu-dev \
    && apt install -y imagemagick

# configure imagemagick
RUN docker-php-ext-configure gd --with-jpeg --with-webp
RUN docker-php-ext-install gd

# Change workingdir and copy contents to the image.
WORKDIR /var/www/html

COPY . .

RUN chown -R www-data:www-data .

# Open http port
EXPOSE 80