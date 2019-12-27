include .env

run:
        @echo "checking mysql connection .......";
        ./db_health_check.sh
        @echo "going to run migrate .....";
        php artisan migrate:refresh --seed
        @echo "start application .........";
        php -S 0.0.0.0:80 -t public
