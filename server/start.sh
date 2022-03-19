chmod -R 755 storage/
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate
php artisan cache:clear
php artisan config:clear
php artisan storage:link
#php artisan config:cache
#exec "php-fpm"