#!/bin/bash
set -e

cp /app/.env.docker /app/.env
php artisan key:generate --force

echo "Notificaciones listo."
exec "$@"
