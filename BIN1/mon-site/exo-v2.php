<?php
// MODEL
$tasks = [
    ["title" => "Devoir", "status" => true, "author" => "User 1"],
    ["title" => "Manger", "status" => false, "author" => "User 2"],
    ["title" => "Cuisiner", "status" => true, "author" => "Titi 3"],
    ["title" => "Pas dormir", "status" => false, "author" => "tutu 12"],
];
$isCompleted = isset($_GET['isCompleted']);
$filterOwner = $_GET['filterOwner'] ?? "";

// CONTROLLER
$filteredTasks = array_filter($tasks, function ($task) use ($isCompleted, $filterOwner) {
    return ($task['status'] === $isCompleted && str_starts_with($task['author'], $filterOwner));
});
?>
<!-- VUE -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
        <label for="isCompleted">Fait ?</label>
        <input id="isCompleted" type="checkbox" name="isCompleted" <?= $isCompleted ? "checked" : "" ?>/>
        <label for="filterOwner">Auteur</label>
        <input id="filterOwner" type="text" name="filterOwner" value="<?= $filterOwner ?>"/>
        <input type="submit" value="Search"/>
    </form>
    <?php if (empty($tasks)) : ?>
        <p>Aucune tâche créée</p>
    <?php else : ?>
        <?php if (empty($filteredTasks)) : ?>
            <p>Aucune tâche correspondant aux critères</p>
        <?php else : ?>
            <ul>
                <?php foreach($filteredTasks as $task) : ?>
                    <li style="text-decoration: <?= $task['status'] ? "line-through" : "none" ?>;"><?= $task['title'] ?> - <?= $task['status'] ? "completed" : "not completed" ?> - <?= $task['author'] ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>