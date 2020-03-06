FROM php:7-alpine

RUN apk --no-cache update \
    && apk --no-cache upgrade \
    # Install pdo_pgsql dependency:
    && apk add --no-cache postgresql-dev \
    # Install pdo_pgsql:
    && docker-php-ext-install pdo pdo_pgsql pgsql \
    # Download and install Composer:
    && wget https://raw.githubusercontent.com/composer/getcomposer.org/master/web/installer -O - -q | php -- --quiet \
    && php composer.phar install \
    # Update database schema from Doctrine entities
    && php vendor/bin/doctrine orm:schema-tool:update --force --dump-sql