# 1. Alap image: Használjunk FPM-et, mivel ez a leggyakoribb Laravel beállítás
# A CLI image (php:8.2-cli) nem tartalmaz FPM-et vagy webszervert.
FROM php:8.2-fpm 

# 2. OS csomagok telepítése (beleértve a git-et, zip-et és a kiterjesztés fejlesztői csomagjait)
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
    git \
    nodejs \
    npm \
    libzip-dev zip unzip \
    libonig-dev \
    # Fontos a CURL a külső API hívásokhoz
    libcurl4-openssl-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# 3. PHP kiterjesztések telepítése
RUN docker-php-ext-install pdo pdo_mysql mbstring zip curl

# 4. Composer telepítése
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 5. Munkakönyvtár beállítása
WORKDIR /var/www/html

# 6. A Laravel kód bemásolása
# Mivel a projekt az SRC mappában van, bemásoljuk a konténer gyökerébe
COPY src/ .

# 7. Composer függőségek telepítése
# Csak a termelési függőségeket telepítjük.
RUN composer install --no-dev --optimize-autoloader

# 8. Utolsó parancs (opcionális, a docker-compose.yml felülírja, de jelzi a célt)
CMD ["php-fpm"]