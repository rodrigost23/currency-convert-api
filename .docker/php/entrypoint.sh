#!/bin/sh
chown www-data:www-data var/cache
chown www-data:www-data logs

set -e

# first arg is `-f` or `--some-option`
if [ "${1#-}" != "$1" ]; then
        set -- php-fpm "$@"
fi

exec "$@"