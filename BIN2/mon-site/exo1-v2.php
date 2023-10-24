<?php

if (!function_exists('str_starts_with')) {
    function str_starts_with(string $haystack, string $needle)
    {
        return strpos($haystack, $needle) === 0;
    }
}

function printCompleted($status)
{
    return $status ? 'completed' : 'not completed';
}
$tasks = json_decode(file_get_contents("./data.json"), true);


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $_POST['status'] = isset($_POST['status']);
    $tasks[] = $_POST;
    file_put_contents('./data.json', json_encode($tasks));
}

if (!empty($tasks)) {
    $isCompleted = isset($_GET['completed']);
    $filterOwner = isset($_GET['filterOwner']) ? $_GET['filterOwner'] : "";

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
        <label for="completed">Completed ?</label><input type="checkbox" id="completed" name="completed" value="1" <?= $isCompleted ? "checked" : "" ?>>
        <label for="filterOwner">FilterOwner ?</label><input type="text" id="filterOwner" name="filterOwner" value="<?= $filterOwner ?>">
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
    <h2>Add task</h2>
    <form method="POST">
        <label for="title">Title ? </label><input type="text" id="title" name="title">
        <label for="status">Completed ? </label><input type="checkbox" id="status" name="status">
        <label for="author">Author ? </label><input type="text" id="author" name="author">
        <input type="submit" value="Add Task">
    </form>
</body>
</html>