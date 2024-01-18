### Перед запуском
Выставить доступы пользователя в <i>/database/seeders/UserSeeder.php</i>

### Запуск приложения в Docker
- docker compose up -d
- docker exec app php artisan key:generate
- docker exec app php artisan jwt:secret
- docker exec app php artisan config:cache
- docker exec app php artisan migrate
- docker exec app php artisan db:seed

### Запуск приложения вручную
- composer install
- php artisan key:generate
- php artisan migrate
- php artisan jwt:secret
- php artisan db:seed
