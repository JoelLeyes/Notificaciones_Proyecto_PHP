#!/bin/sh
set -e

if [ ! -f /app/.env ] && [ -f /app/.env.docker ]; then
	cp /app/.env.docker /app/.env
fi

mkdir -p /app/storage/logs
mkdir -p /app/storage/framework/cache
mkdir -p /app/storage/framework/sessions
mkdir -p /app/storage/framework/views
touch /app/storage/logs/laravel.log

php artisan key:generate --force

echo "Notificaciones listo."
exec "$@"
