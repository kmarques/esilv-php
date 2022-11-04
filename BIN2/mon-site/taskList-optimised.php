<?php

//<protocol>://<domain>:<port>/<path>?<query_params>#<anchor>

// variables globales
echo "<pre>";
var_dump($_GET); // => query params
var_dump($_POST); // => post params
var_dump($_REQUEST); // => merge query/post
var_dump($_FILES); // => file temporary paths
var_dump($_SERVER); // => server infos + request infos
echo "</pre>";

$theme = [
    "headerClass" => isset($_GET['headerClass']) ? $_GET['headerClass'] : ""
];
$tasks = [
    [
        "title" => "dormir",
        "completed" => true,
    ],
    [
        "title" => "manger",
        "completed" => false,
    ],
    [
        "title" => "travailler",
        "completed" => true,
    ]
];
$isCompleted = isset($_REQUEST['completed']) ? filter_var($_REQUEST['completed'], FILTER_VALIDATE_BOOLEAN) : null;

require_once "./includes/start_html.php";
require_once "./includes/header.php";
?>
    <style>
        <?php require_once "./includes/css/tasklist.css"; ?>
    </style>
    <main>
        <h1>Liste des tâches</h1>
        <?php require_once './includes/task/taskFilter.php' ?>
        <ul>
            <?php foreach($tasks as $task): ?>
                <?php if ($isCompleted === null || ($isCompleted === $task['completed'])) : ?>
                    <?php require "./includes/task/taskitem.php"; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </main>
<?php
require_once "./includes/footer.php";
require_once "./includes/end_html.php";
?>


<!-- http://localhost:80/tasklist-optimised.php
https://localhost:443/tasklist-optimised.php?headerClass=bg-green&header=test#test -->