<?php

require_once "./lib/polyfill.php";

$tasks = json_decode(file_get_contents("./data.json"), true);

unset($tasks[intval($_GET['delete'])]);
file_put_contents('./data.json', json_encode($tasks));
unset($_GET['delete']);

header('Location: /tasks.php');
