<?php

$dsn = "mysql:host=db;dbname=app";
//$dsn = "mysql:host=localhost;dbname=app";

$user = "root";
$password = "root";

$db = new PDO($dsn, $user, $password);
