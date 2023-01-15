#!/bin/bash

[ ! -f ".env" ] && cp .env.example .env

#sudo chown www-data:www-data storage
#sudo chown www-data:www-data bootstrap/cache

docker-compose up --build -d

./composer.sh install
./artisan.sh cache:clear
./artisan.sh view:clear
./artisan.sh route:clear
./artisan.sh migrate

echo 'Ready. Address: http://localhost'
