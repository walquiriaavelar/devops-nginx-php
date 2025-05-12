# Usando a imagem oficial do PHP com FPM
FROM php:8.1-fpm

# Instalar dependências necessárias para o MySQL e outras bibliotecas
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libmariadb-dev-compat \
    libmariadb-dev \
    && docker-php-ext-install pdo pdo_mysql mysqli

# Configurar o PHP para suporte ao GD e ao MySQL
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd

# Copiar o arquivo php.ini customizado
COPY php.ini /usr/local/etc/php/

# Copiar o código para o diretório de trabalho do container
WORKDIR /var/www/html

# Expor a porta 9000 para o PHP-FPM
EXPOSE 9000
