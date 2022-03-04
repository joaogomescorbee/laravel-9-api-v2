<?php
require("../vendor/autoload.php");

//$path = str_replace(" ", "\\ ", realpath("./"));
$openapi = \OpenApi\Generator::scan(['../app/Http/Controllers/Api/Users/']);

header('Content-Type: application/x-yaml');
$file = 'swagger.json';
file_put_contents($file, $openapi->toJson());
echo $openapi->toJson();