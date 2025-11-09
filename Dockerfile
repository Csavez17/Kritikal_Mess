FROM php:8.2-cli

# 1. RUN: Telepítjük az OS csomagokat, beleértve a szükséges dev csomagokat
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
    # A git-re és a zip/unzip csomagokra szükség van a projekthez és composerhez
    git libzip-dev zip unzip \
    # A libonig-dev (oniguruma) kell az mbstring telepítéséhez
    libonig-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# 2. RUN: Telepítjük a PHP kiterjesztéseket
RUN docker-php-ext-install pdo pdo_mysql mbstring

# Composer telepítése multi-stage build-del
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# A CMD a docker-compose.yml-ben lesz felülírva a composer és artisan parancsokkal
# CMD php artisan serve --host=0.0.0.0 --port=8000