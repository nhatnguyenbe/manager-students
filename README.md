# Laravel Students Manager System

This is simple student management system. This project has also include Laravel Role Permission System (spatie)

![Alt text](image-1.png)

### This project uses the following packages:

    horizon
    telescope
    flysystem-aws
    phpspreadsheet
    spatie-medialibrary
    scrib
    laravel/sanctum
    laravel/scout
    meilisearch-php
    predis

### Installation

    Navigate to the project directory:
    cd project

    Install dependencies:
    composer install

    Set up environment variables:
    cp .env.example .env and configure your environment variables in the .env file

    Generate a key:
    php artisan key:generate

    Run the migrations and seed:
    php artisan migrate --seed

    Start the development server:
    php artisan serve
