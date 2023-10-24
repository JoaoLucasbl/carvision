FROM php:8.0-apache
SHELL ["/bin/bash", "-c"]
RUN ln -s ../mods-available/{expires,headers,rewrite}.load /etc/apache2/mods-enabled/
RUN sed -e '/<Directory \/var\/www\/>/,/<\/Directory>/s/AllowOverride None/AllowOverride All/' -i /etc/apache2/apache2.conf
# COPY php.ini /usr/local/etc/php/
RUN apt-get update && apt-get upgrade -y
RUN docker-php-ext-install mysqli && apache2ctl restart
RUN apt-get update \
     && apt-get install -y libzip-dev \
     && docker-php-ext-install zip
# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer