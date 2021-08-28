# cp .env.example .env
php artisan clear-compiled
composer dumpautoload -o
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan migrate --force
php artisan cache:clear
php artisan scribe:generate
php artisan enlightn --ci --report
