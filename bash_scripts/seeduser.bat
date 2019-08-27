echo "db:seed"
php artisan db:seed --verbose
echo "seed-user-table"
php artisan db:seed --class=UsersTableSeeder
echo "seed-role-table"
php artisan db:seed --class=RoleTableSeeder
echo "seed-userrole-table"
php artisan db:seed --class=RoleUsersTableSeeder