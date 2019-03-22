#!/bin/bash

(
cd /home/www/io-500-webpage
git pull -q
cd data
jekyll build
) > /dev/null

