#!/bin/sh
# wait until MySQL is really available
apt-get update
apt-get install -y mariadb-client

echo "host: $DB_HOST -- user: $DB_USERNAME  --  password: $DB_PASSWORD";

while ! mysqladmin ping -h"$DB_HOST" -u"$DB_USERNAME" -p"$DB_PASSWORD" --silent; do
    sleep 1
done