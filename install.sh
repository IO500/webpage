#!/bin/bash

wget https://getcomposer.org/installer | xargs php

php composer.phar install

cp config/app_local.example.php config/app_local.php

echo "NOTICE: You should now configure the database connection in the app_local.php file."
