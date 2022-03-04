#!/bin/bash

rm -Rf ../public/swagger/

mkdir ../public/swagger

php ../vendor/bin/openapi --bootstrap --output ../public/swagger ./swagger-v1.php
