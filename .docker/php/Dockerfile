FROM php:7.3-fpm-alpine

RUN apk --no-cache update \
    && apk --no-cache upgrade \
    # Install pdo_pgsql dependency:
    && apk add --no-cache postgresql-dev \
    # Install pdo_pgsql:
    && docker-php-ext-install pdo pdo_pgsql pgsql \
    # Download and install Composer:
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# CMD composer install
    # Update database schema from Doctrine entities
    # && php vendor/bin/doctrine orm:schema-tool:update --force --dump-sql