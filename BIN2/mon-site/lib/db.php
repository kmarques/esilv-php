<?php

// Example Docker
$db = new PDO(
    'mysql:dbname=app;host=db',
    "username",
    "password"
);

// Example MAMP
//$db = new PDO(
//    'mysql:dbname=mydb;host=127.0.0.1',
//    "root"
//);
