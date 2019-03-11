# Laravel Tasks Api

Simpliest REST Api built with laravel.

## Install from archive

1 . Clone repository

2 . Install dependencies

```
composer install
```

3 . Create database

```
CREATE DATABASE justdo CHARACTER SET utf8 COLLATE utf8_general_ci;
CREATE DATABASE justdo_testing CHARACTER SET utf8 COLLATE utf8_general_ci;
```

4 . Configure db connection - edit ```.env```

```
cp .env.example .env
cp .env.example .env.testing
```

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=downloader_app
DB_USERNAME=root
DB_PASSWORD=password
```

5 . Apply migrations

```
php artisan migrate
```

6 . Run server

```
php artisan serve
```

## Usage - REST

See attached postman collection for more details: [justdo_api.postman_collection.json](docs/justdo_api.postman_collection.json)

1 . Get all tasks

```
curl -X GET \
  http://127.0.0.1:8000/api/tasks
```

2 . Get task by id

```
curl -X GET \
  http://127.0.0.1:8000/api/task/1
```

3 . Create task

```
curl -X POST \
  http://127.0.0.1:8000/api/task \
  -H 'Content-Type: application/json' \
  -d '{
  "title": "new task",
  "description": "new task description",
  "due_datetime": "2019-03-11 23:10:00",
  "priority": 2
}'
```

4 . Update task

```
curl -X PUT \
  http://127.0.0.1:8000/api/task/2 \
  -H 'Content-Type: application/json' \
  -d '{
  "title": "task 2",
  "description": "task 2 description",
  "due_datetime": "2019-03-11 23:40",
  "priority": 3,
  "status": 2
}'
```

5 . Delete task

```
curl -X DELETE \
  http://127.0.0.1:8000/api/task/3
```