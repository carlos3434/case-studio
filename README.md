# Requirements
- docker (for Windows and MacOS https://www.docker.com/products/docker-desktop)

# Installation
1. Generate vendor files
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-reqs

```

2. Setup environment
```
./vendor/bin/sail up
```


3. dev

php artisan make:migration create_employees_table
php artisan run migrate
php artisan make:seeder EmployeeSeeder
php artisan db:seed --class=EmployeeSeeder

composer require laravel/breeze --dev

php artisan breeze:install vue
npm install
npm run dev
php artisan migrate

#php artisan breeze:install api
#php artisan migrate

##roles

composer require spatie/laravel-permission

#add repo in config/app.php

php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"

#test

php artisan make:test EmployeeTest

./vendor/bin/phpunit

composer require laravel/passport
php artisan migrate
php artisan passport:install