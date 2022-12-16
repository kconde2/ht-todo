#!/bin/sh

while ! (docker compose logs app |grep -o "Starting... cmd: php-fpm") ; do
    sleep 10
    echo "Waiting for app ..."
done

while ! (docker compose logs web |grep -o "Started Nginx") ; do
    sleep 3
    echo "Waiting for Nginx ..."
done

echo "Nginx & app are now ready 🔥"

echo "Todo app url: http://localhost:8083"
