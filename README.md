# Financial-backend

## Clone this repository
```
git clone https://github.com/gustamms/financeira-backend.git

cd financeira-backend

git checkout master

composer install

cd www

cp .env.example .env

php artisan key:generate

php artisan jwt:secret --force
```

# Create database

```
CREATE DATABASE financial;
```


```
php artisan migrate --seed
```

## To reacreate all database, execute this command
### Remember, this command you'll LOSING all data is in the tables

```
php artisan migrate:refresh --seed
```



