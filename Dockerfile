# 1️⃣ Image PHP-FPM
FROM php:8.2-fpm

# 2️⃣ Installer les dépendances système nécessaires pour Laravel
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    libicu-dev \
    libpng-dev \
    libjpeg-dev \
    curl \
    zip \
    && docker-php-ext-install pdo_mysql mbstring xml zip intl

# 3️⃣ Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 4️⃣ Définir le répertoire de travail
WORKDIR /var/www/html

# 5️⃣ Copier tout le projet
COPY . .

# 6️⃣ Installer les dépendances PHP
RUN composer install --no-interaction --optimize-autoloader

# 7️⃣ Donner les permissions correctes pour Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 8️⃣ Exposer le port FPM
EXPOSE 9000

# 9️⃣ Lancer PHP-FPM
CMD ["php-fpm"]