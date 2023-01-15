#!/bin/bash

[ ! -f ".env" ] && cp .env.example .env

docker-compose up --build -d

./composer.sh install
./artisan.sh cache:clear
./artisan.sh view:clear
./artisan.sh migrate

echo 'Ready. Address: http://localhost'
