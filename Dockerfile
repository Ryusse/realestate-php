# PHP-VITE-STARTER/Dockerfile
FROM php:8.2-fpm

# Instalar dependencias del sistema y extensiones PHP
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    git \
    && rm -rf /var/lib/apt/lists/*

# Instalar extensiones PHP comunes para MySQL y otras necesidades
RUN docker-php-ext-install pdo_mysql zip opcache

# Si usas Composer, puedes instalarlo
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html # Establece el directorio de trabajo dentro del contenedor