<?php
require('./includes/checkSession.php');

if ($USER === null) {
    header('Location: /login.php');
    exit();
}

if(!isset($_SESSION['visitorId'])) {
    $_SESSION['visitorId'] = uniqid();
    echo "New visitor : " . $_SESSION['visitorId'];
} else {
    echo "Welcome back : " . $_SESSION['visitorId'];
}


// MODEL
require_once('models/tasks.model.php');
$tasks = getTasks($db);
$isCompleted = isset($_GET['isCompleted']);
$filterOwner = $_GET['filterOwner'] ?? "";

// CONTROLLER
$pageTitle = "Tasks List";

if (isset($_GET['action']) && $_GET['action'] === "edit") {
    $tasks = array_map(function ($task) {
        if ($task['title'] === $_GET['title']) {
            $task['status'] = !$task['status'];
        }
        return $task;
    }, $tasks);
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    addTask($db, $_POST);
    $tasks = getTasks($db);
    var_dump($tasks);
}

$filteredTasks = array_filter($tasks, function ($task) use ($isCompleted, $filterOwner) {
    return ($task['status'] === $isCompleted && str_starts_with($task['author'], $filterOwner));
});

?>
<!-- VUE -->
<?php require_once('includes/header.html.php'); ?>
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
                    <li style="text-decoration: <?= $task['status'] ? "line-through" : "none" ?>;"><?= $task['title'] ?> - <?= $task['status'] ? "completed" : "not completed" ?> - <?= $task['author'] ?><a href="/edit-task.php?title=<?= $task['title']?>">Edit</a><a href="/delete-task.php?id=<?= $task['id']?>">Delete</a></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    <?php endif; ?>
    <form action="" method="POST">
        <label for="isCompleted">Fait ?</label>
        <input id="isCompleted" type="checkbox" name="status"/>
        <label for="author">Auteur</label>
        <input id="author" type="text" name="author"/>
        <label for="title">Titre</label>
        <input id="title" type="text" name="title"/>
        <input type="submit" value="Ajouter"/>
    </form>
<?php require_once('includes/footer.html.php'); ?>