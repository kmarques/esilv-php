<?php

$dsn = "mysql:host=db;dbname=app;port=3306";
//$dsn = "mysql:host=localhost;dbname=app;charset=utf8";

$username = "root";
$password = "root";

$db = new PDO($dsn, $username, $password);
