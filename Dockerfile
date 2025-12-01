FROM php:8.2-fpm

# 1. Csomagok
RUN apt-get update && apt-get install -y --no-install-recommends \
    git nodejs npm libzip-dev zip unzip libonig-dev libcurl4-openssl-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# 2. Ext
RUN docker-php-ext-install pdo pdo_mysql mbstring zip curl

# 3. Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# ⭐ VÁLTOZÁS: Most kívül vagyunk, tehát az "src/" mappát másoljuk be!
COPY src/ .

# 4. Takarítás (Fontos!)
RUN rm -rf vendor composer.lock bootstrap/cache/*.php node_modules

# 5. Telepítés (Most már látnia kell a composer.json-t, mert bemásoltuk az src-ből)
RUN composer install --no-dev --optimize-autoloader

# 6. Jogosultságok
RUN chown -R www-data:www-data /var/www/html

# 7. .env
RUN cp .env.example .env

CMD ["php-fpm"]