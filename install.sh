#!/bin/bash

wget https://getcomposer.org/installer

php installer
php composer.phar install

cp config/app_local.example.php config/app_local.php

echo "NOTICE: You should now configure the database connection in the config/app_local.php file."
echo "Specifically these 4: 'host', 'username', 'password' and 'database' in Datasources/default"
