<?php
var_dump($_GET);
$user = [
    "firstname" => "John",
    "lastname" => "Doe",
];
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
?>


<?php
require_once "./includes/start_html.php";
require_once "./includes/header.php";
?>
    <main>
        <h1>Liste des tâches</h1>
        <ul>
            <?php foreach($tasks as $task): ?>
                <?php require "./includes/task/taskitem.php"; ?>
            <?php endforeach; ?>
        </ul>
    </main>
<?php
require_once "./includes/footer.php";
require_once "./includes/end_html.php";
?>