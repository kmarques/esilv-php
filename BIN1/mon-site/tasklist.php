<?php
    $user = [
        "firstname" => "John",
        "lastname" => "Doe",
    ];
    $tasks = [
        [
            "title"=> "dormir",
            "completed"=> true,
        ],
        [
            "title"=> "manger",
            "completed"=> false
        ],
        [
            "title"=> "travailler",
            "completed"=> true
        ]
    ];
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste de tâches</title>
</head>
<body>
    <header>
        <h3>Portail intervenants - <?= $user["firstname"] . " " . $user['lastname'] ?></h3>
        <nav>
            <ul>
                <li><a href="index.php">Acceuil</a></li>
                <li><a href="tasklist.php">Liste de tâches</a></li>
                <li><a href="exo1.php">Exo 1</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Liste de tâches</h1>
        <ul>
            <?php foreach($tasks as $task) : ?>
                <li <?= $task['completed'] ? 'style="text-decoration: line-through;"' : '' ?>><?= $task['title'] ?></li>
            <?php endforeach; ?>
        </ul>
    </main>
    <footer>ALV Online - <?= date('Y'); ?> © Léonard de Vinci</footer>
</body>
</html>