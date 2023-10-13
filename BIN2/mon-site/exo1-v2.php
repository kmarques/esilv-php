<?php

function printCompleted($status)
{
    return $status ? 'completed' : 'not completed';
}

$tasks = [
    ["title" => "Faire la vaisselle", "status" => true, "author" => "Antoine"],
    ["title" => "Faire le ménage", "status" => false, "author" => "Hippolyte"],
    ["title" => "Faire la cuisine", "status" => true, "author" => "Ahmed"],
    ["title" => "Faire la lessive", "status" => true, "author" => "Antony"],
    ["title" => "Faire les courses", "status" => true, "author" => "Brian"],
];

if (!empty($tasks)) {
    $isCompleted = isset($_GET['completed']);
    $filterOwner = $_GET['filterOwner'];

    $filteredValues = array_filter($tasks, function ($task) use ($isCompleted, $filterOwner) {
        return $task['status'] === $isCompleted && str_starts_with($task['author'], $filterOwner);
    });
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Filters</h2>
    <form>
        <input type="checkbox" name="completed" value="1" <?= $isCompleted ? "checked" : "" ?>>
        <input type="text" name="filterOwner" value="<?= $filterOwner ?>">
        <input type="submit" value="Filter">
    </form>
    <?php if (empty($tasks)) : ?>
        Aucune tâche créée
    <?php else : ?>
        <?php if (empty($filteredValues)) : ?>
            Aucune tâche correspondant aux filtres
        <?php else : ?>
            <ul>
                <?php foreach($filteredValues as $task) : ?>
                    <li><?= $task['title'] ?> <?= printCompleted($task["status"])?> <?= $task['author']?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>