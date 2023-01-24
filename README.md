Run the following commands before browse:

php artisan migrate
php artisan db:seed --class=Counties
php artisan db:seed --class=Countries

Then go to http://localhost/laravel/public/login