# web: php artisan storage:link && php artisan migrate --force && php artisan db:seed --force && php -S 0.0.0.0:$PORT -t public
# web: php artisan storage:link && php artisan migrate:fresh --seed --force && php -S 0.0.0.0:$PORT -t public
web: rm -rf public/storage && php artisan storage:link && php artisan migrate --force && php -S 0.0.0.0:$PORT -t public