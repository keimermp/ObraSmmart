# ==========================================
# ETAPA 1: COMPILAR FRONTEND CON VITE
# ==========================================
FROM node:22-bookworm-slim AS frontend

WORKDIR /app

COPY package*.json ./
RUN npm install

COPY . .
RUN npm run build


# ==========================================
# ETAPA 2: LARAVEL + APACHE
# ==========================================
FROM php:8.4-apache

# Dependencias del sistema y certificados SSL
RUN apt-get update && apt-get install -y --no-install-recommends \
    ca-certificates \
    libicu-dev \
    libzip-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j"$(nproc)" \
        pdo_mysql \
        bcmath \
        intl \
        zip \
        gd \
        opcache \
    && a2enmod rewrite headers \
    && rm -rf /var/lib/apt/lists/*

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copiar proyecto Laravel
COPY . .

RUN ls -l /var/www/html/public/favicon.png

# Copiar archivos compilados por Vite
COPY --from=frontend /app/public/build ./public/build

# Instalar dependencias de producción
RUN composer install \
    --no-dev \
    --prefer-dist \
    --no-interaction \
    --no-progress \
    --optimize-autoloader \
    && chown -R www-data:www-data storage bootstrap/cache \
    && sed -ri 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf \
    && sed -ri 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf \
    && printf 'Listen 10000\n' > /etc/apache2/ports.conf \
    && sed -ri 's/:80>/:10000>/' /etc/apache2/sites-available/000-default.conf

EXPOSE 10000

CMD ["apache2-foreground"]