# PHP + Laravel 用
FROM php:8.3-fpm

# 作業ディレクトリ
WORKDIR /var/www/html

# 必要な拡張インストール
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libonig-dev \
    && docker-php-ext-install pdo_mysql mbstring zip

# Composer インストール
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Laravelをインストールするためにコピー (空でもOK)
COPY . .

# ポート指定（php-fpmは通常9000だが、docker-compose.ymlで8000にマッピングする）
EXPOSE 9000
