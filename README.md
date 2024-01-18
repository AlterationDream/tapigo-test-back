## Запуск приложения
- composer install
- npm install
- переименовать <i>.env.example</i> в <i>.env</i> и заполнить доступ к БД.
- php artisan key:generate
- php artisan migrate
- php artisan jwt:secret
- Выставить доступы пользователя в <i>/database/seeders/UserSeeder.php</i> и запустить <i>php artisan db:seed</i>
