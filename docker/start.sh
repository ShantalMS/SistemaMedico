#!/bin/bash

# Start PHP-FPM in background
php-fpm -D

# Wait for MySQL to be ready
echo "Waiting for MySQL..."
sleep 5

# Run migrations
echo "Running migrations..."
php artisan migrate --force || echo "Migration failed, continuing..."

# Clear and cache config
echo "Caching configuration..."
php artisan config:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start Nginx in foreground
echo "Starting Nginx..."
nginx -g 'daemon off;'
