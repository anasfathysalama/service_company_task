## Solution task for delivery service company

This application contain an implementation for delivery service company handles the
collection and delivery of parcels for people.
---

## Installation

You can run this application by using docker or by using of any  local development.

#### After clone repo 

**This step for all kind of installation**
inside root directory for application run ``` composer install ``` and then copy ``.env.example`` to ``.env``


##### Using Docker .<br>

after clone this repo you will find `docker-compose.yaml` file, and it contains all services the application need.

**Steps** .<br>
- inside root directory for application run `` docker-compose up --build `` and it will build nginx , php , mysql and phpmyadmin images for you
- run ``` docker-compose exec php php artisan key:generate ``` to generate key for application.
- run ``` docker-compose exec php php artisan optimize:clear ``` to clear all cache.
- add database credentials in ``.env`` file.
- you will find database info inside  `docker-compose.yaml` file in mysql_db service environment key, run
``` docker-compose exec php php artisan migrate --seed``` to create tables and seed 5 sender and 10 bikers .

you will, can access the dashboard under ``` http://localhost:8000 ``` .<br>
and, access the phpmyadmin under ``` http://localhost:8888 ```  and using the database credentials to access it.


##### Using Local Development .<br>

after clone this repo you will find `docker-compose.yaml` file, and it contains all services the application need.


**Steps** .<br>

- create your database and setup it inside ``` .env ``` file.
- run ```php artisan key:generate ``` to generate key for application.
- run ``` php artisan optimize:clear ``` to clear all cache.
- run  ``` php artisan migrate --seed``` to create tables and seed 5 sender and 10 bikers .

---
## Usage of web dashboard

- you can access web dashboard in ``` http://localhost:8000 ``` and, can login using any of account persists in database.
- senders account can log in under ``` username is sender_1``` from 1 to 5 and ``` password is 123456 ```.
- bikers account can log in under ``` username is biker_1``` from 1 to 10 and ``` password is 123456 ```.
- can register new biker or sender account.
- sender can only see his parcels.
- you will find all web routes inside ```routes/web.php``` file


## Usage of api

**Note** , you need to apply request headers to ``` Accept:application/json ``` to see validation errors inside your postman  or any other api tool.

- you need to add api after url and then type your route like this example ```http://localhost:8000/api/biker-parcels```
- you will find all api routes inside ```routes/api.php``` file.
- token type for authorization requests is ```Bearer``` .


