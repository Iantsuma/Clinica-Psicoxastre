# Use uma imagem base oficial do PHP
FROM php:8.2-fpm

# Defina o diretório de trabalho
WORKDIR /var/www/html

# Instale dependências de sistema necessárias
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl

# Instale Node.js e npm
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash -
RUN apt-get install -y nodejs

# Instale extensões PHP necessárias
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

# Instale Composer
COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer

# Copie o restante dos arquivos da aplicação
COPY . /var/www/html

# Remova node_modules e package-lock.json se existirem
RUN rm -rf node_modules package-lock.json

# Instale dependências do Composer
RUN composer install

# Instale dependências do NPM
RUN npm install

# Construa os assets do Vite
RUN npm run build

# Dê permissão ao diretório de cache do Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Exponha a porta 9000 para o PHP-FPM
EXPOSE 9000

# Comando de inicialização do PHP-FPM
CMD ["php-fpm"]
