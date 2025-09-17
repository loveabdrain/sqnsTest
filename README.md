## Запуск
Настройки бд сохранил в .env.example
```sh
composer install
cp .env.example .env
docker-compose up -d
docker-compose exec app php artisan migrate
docker-compose exec app php artisan jwt:secret
docker-compose exec app php artisan key:generate
docker-compose down && docker-compose up -d
```
