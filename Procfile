release: php artisan clear-compiled && composer dumpautoload -o && php artisan optimize && php artisan config:cache && php artisan route:cache && php artisan migrate --force && php artisan cache:clear
web: vendor/bin/heroku-php-apache2 public/
