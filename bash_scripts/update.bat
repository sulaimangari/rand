echo "cache-clear"
php artisan cache:clear
echo "clear-compiled"
php artisan clear-compiled
echo "optimize"
php artisan optimize
echo "dump-autoload"
composer dump-autoload
echo "install"
composer install --no-scripts
echo "clear-cache"
composer clear-cache
echo "update"
composer update --verbose
echo "self-update"
composer self-update -vvv
echo "diagnose"
composer diagnose