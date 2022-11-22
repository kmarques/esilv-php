<?php

// Version docker
$db = new PDO(
    'mysql:dbname=app;host=db',
    "username",
    "password"
);
// Version mamp
//$db = new PDO(
//    'mysql:dbname=app;host=127.0.0.1',
//    "username",
//    "password"
//);

// Example Query
//$stmt = $db->query("INSERT INTO task (title) VALUES ('manger')", PDO::FETCH_ASSOC);
//$stmt->execute();
//
//$stmt = $db->query("SELECT * FROM task", PDO::FETCH_ASSOC);
//$rows = $stmt->fetchAll();

// Example prepare
$stmt = $db->prepare("SELECT * FROM task WHERE title LIKE :title");
$stmt->execute([
    'title' => 'd%'
]);
$rows = $stmt->fetchAll();
var_dump($rows);
