#!/bin/sh
set -e

if [ ! -f /app/.env ] && [ -f /app/.env.docker ]; then
	cp /app/.env.docker /app/.env
fi
php artisan key:generate --force

echo "Notificaciones listo."
exec "$@"
