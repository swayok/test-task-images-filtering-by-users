#!/bin/bash

docker-compose up -d

./artisan.sh cache:clear
./artisan.sh view:clear
