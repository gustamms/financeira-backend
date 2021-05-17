# Financial-backend

## Clone this repository
```
git clone https://github.com/gustamms/financeira-backend.git
```
```
cd financeira-backend
```
```
git checkout main
```
```
cp .env.example .env
```
### Set the Docker's database information on .env
```
docker-compose -d --build
```
### After services went up

# Create database

```
CREATE DATABASE financial;
```
### On the www path

```
cd www
```
```
cp .env.example .env
```
### Set database information in .env

### Variable DB_HOST, follow this commands

```
docker ps
```

### You'll see this lines

CONTAINER ID | IMAGE | COMMAND | CREATED | STATUS | PORTS | NAMES
--- | --- | --- | --- | --- | --- | --- | 
c522a38f4994 | financeira-backend_webserver | "docker-php-entrypoi…" | 6 minutes ago | Up 6 minutes | 0.0.0.0:80->80/tcp, :::80->80/tcp, 0.0.0.0:443->443/tcp, :::443->443/tcp | webserver
3350944e0d17 | financeira-backend_database | "docker-entrypoint.s…" | 6 minutes ago | Up 6 minutes | 0.0.0.0:3306->3306/tcp, :::3306->3306/tcp, 33060/tcp | database

### In the line, where the IMAGE column is financial-backend_database, take the NAMES and put it in DB_HOST
### And set the database credentials

## When the webserver and database containers is up, attach the webservice and execute this following commands 

```
composer install
```
```
php artisan key:generate
```
```
php artisan jwt:secret --force
```
```
php artisan migrate --seed
```

## To reacreate all database, execute this command
### Remember, this command you'll LOSING all data is in the tables

```
php artisan migrate:refresh --seed
```



