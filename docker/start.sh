#!/bin/bash

# Start PHP-FPM
php-fpm -D

# Run migrations
php artisan migrate --force

# Cache config
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start Nginx
nginx -g 'daemon off;'
