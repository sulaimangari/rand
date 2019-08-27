echo "cache-clear"
php artisan cache:clear
echo "clear-compiled"
php artisan clear-compiled
echo "optimize"
php artisan optimize
echo "config:cache"
php artisan config:cache
echo "dump-autoload"
composer dump-autoload
echo "refresh"
php artisan migrate:fresh --force --verbose
echo "migrate"
php artisan migrate --path=database/migrations
echo "db:seed"
php artisan db:seed --verbose
echo "seed-user-table"
php artisan db:seed --class=UsersTableSeeder
echo "seed-role-table"
php artisan db:seed --class=RoleTableSeeder
