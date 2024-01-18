### Перед запуском
- Переименовать .env.example в .env и выставить доступы к БД.
- Выставить доступы пользователя в <i>/database/seeders/UserSeeder.php</i>

### Запуск приложения в Docker
- docker compose up -d
- docker-compose exec composer install
- docker-compose exec app php artisan key:generate
- docker-compose exec app php artisan migrate
- docker-compose exec app php artisan jwt:secret
- docker-compose exec app php artisan config:cache
- docker-compose exec app php artisan db:seed
- Приложение будет доступно по адресу <i>localhost:8083</i>

### Запуск приложения вручную
- composer install
- php artisan key:generate
- php artisan migrate
- php artisan jwt:secret
- php artisan config:cache
- php artisan db:seed
- Приложение будет доступно по адресу <i>localhost:8000</i>

### Доступные роуты
- /api/login        - Вход по данным (multipart/form-data) [email, password]
- /api/register     - Регистрация пользователя (multipart/form-data) [name, email, password, password_confirmation]
- /api/logout       - Деактивация токена (auth: Bearer Token)
- /api/refresh      - Обновление токена (auth: Bearer Token)
- /api/current-user - Данные текущего пользователя (auth: Bearer Token)
- /api/posts        - Список постов (auth: Bearer Token)
- /api/posts/{id}   - Отдельный пост (auth: Bearer Token) [{id} - ID поста]
- /api/own-posts    - Посты пользователя, выполнившего вход (auth: Bearer Token)
