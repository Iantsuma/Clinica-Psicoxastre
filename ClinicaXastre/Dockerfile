FROM php:8.3.6-apache

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs \
    npm \
    iputils-ping \
    dnsutils \
    netcat-openbsd

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

COPY --from=composer:2.7.6 /usr/bin/composer /usr/bin/composer

COPY /laravel /var/www/html

COPY init.sh /usr/local/bin/init.sh

RUN chmod +x /usr/local/bin/init.sh

RUN cd /var/www/html && npm install

RUN cd /var/www/html && composer install

RUN cd /var/www/html && npm run build

RUN a2enmod rewrite

RUN chown -R www-data:www-data /var/www/html/storage/

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

EXPOSE 80 3000

CMD ["/usr/local/bin/init.sh"]
