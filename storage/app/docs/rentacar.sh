#!/bin/bash

git clone https://github.com/iscuiz/rentacar rentacar

cd rentacar

composer install

cp .env.example .env

php artisan key:generate