# Application Starter

First clone the repository
```bash
git clone https://github.com/lappet69/laravel-lumen-api-contact.git

cd laravel-lumen-api-contact

composer install

```
## Setup Environment

Copy `.env.example` to `.env` for your app, specifically the baseURL
and database settings.

```bash
php artisan key:generate

```

## DB Configuration
make sure your database configuration in .env is correct

then run the following command
```bash
php artisan migrate

php artisan db:seed --class=ContactSeeder

```

## Run application

```bash
php artisan serve

or

php -S localhost:8000 -t public

```


## Laravel Lumen
Documentation for the framework can be found on the [Lumen Website]




[Lumen Website]:https://lumen.laravel.com/docs/