<?php

session_start();

if(!isset($_SESSION['alreadyVisited'])) {
    echo "Unknown visitor";
} else {
    echo "Hi again";
}


$user = [
    "firstname" => "John",
    "lastname" => "Doe",
];
$theme = [
    "headerClass" => "bg-blue"
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        header {
            background-color: green;
        }
        header.bg-blue {
            background-color: blue;
        }
        main {
            background-color: yellow;
        }
        footer {
            background-color: red;
        }
    </style>
</head>
<body>
    <header <?= isset($theme['headerClass']) ? 'class="'. $theme['headerClass']. '"' : ''; ?>>
        <nav>
            <div>Portail Intervenants - <?= $user["lastname"]." ".$user['firstname']; ?></div>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="taskList.php">Liste des tâches</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Liste des tâches</h1>
        <ul>
            <?php foreach($tasks as $task): ?>
                <li style="text-decoration: <?= $task['completed'] ? 'line-through' : 'none'?>;"><?= $task['title'] ?></li>
            <?php endforeach; ?>
        </ul>
    </main>
    <footer>
        ALV Online - <?= date("Y"); ?> © Léonard de Vinci
    </footer>
</body>
</html>