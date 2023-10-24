<?php

if (!function_exists('str_starts_with')) {
    function str_starts_with(string $haystack, string $needle)
    {
        return $needle === "" || strpos($haystack, $needle) === 0;
    }
}

function printCompleted($status)
{
    return $status ? 'completed' : 'not completed';
}
$tasks = json_decode(file_get_contents("./data.json"), true);


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['add'])) {
        $_POST['add']['status'] = isset($_POST['add']['status']);
        $tasks[] = $_POST['add'];
    } else {
        $_POST['edit']['status'] = isset($_POST['edit']['status']);
        $tasks[$_GET['edit']] = $_POST['edit'];
    }
    file_put_contents('./data.json', json_encode($tasks));
} else {
    if (isset($_GET['delete'])) {
        unset($tasks[intval($_GET['delete'])]);
        file_put_contents('./data.json', json_encode($tasks));
        unset($_GET['delete']);
    }
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
                <?php foreach($filteredValues as $index => $task) : ?>
                    <li>
                        <?= $task['title'] ?> <?= printCompleted($task["status"])?> <?= $task['author']?>
                        <a href="?<?= http_build_query($_GET); ?>&delete=<?= $index ?>">Delete</a>
                        <a href="?<?= http_build_query($_GET); ?>&edit=<?= $index ?>">Edit</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    <?php endif; ?>
    <h2>Add task</h2>
    <form method="POST">
        <label for="title">Title ? </label><input type="text" id="title" name="add[title]">
        <label for="status">Completed ? </label><input type="checkbox" id="status" name="add[status]">
        <label for="author">Author ? </label><input type="text" id="author" name="add[author]">
        <input type="submit" value="Add Task">
    </form>
    <?php if (isset($_GET['edit'])) :?>
        <h2>Edit task <?= $_GET['edit'] ?></h2>
        <form method="POST">
            <label for="title">Title ? </label><input type="text" id="title" name="edit[title]" value="<?= $tasks[$_GET['edit']]['title'] ?>">
            <label for="status">Completed ? </label><input type="checkbox" id="status" name="edit[status]" <?= $tasks[$_GET['edit']]['status'] ? "checked" : '' ?>>
            <label for="author">Author ? </label><input type="text" id="author" name="edit[author]" value="<?= $tasks[$_GET['edit']]['author'] ?>">
            <input type="submit" value="Edit Task">
        </form>
    <?php endif; ?>
</body>
</html>