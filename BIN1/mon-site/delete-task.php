<?php

require_once('./models/tasks.model.php');

$task = getTask($db, $_GET['id']);

if (isset($_GET['action']) && $_GET['action'] === "delete") {
    deleteTask($db, $_GET['id']);
    header('Location: /tasks.php');
}

?>
<!-- VUE -->
<?php require_once("./includes/header.html.php") ?>
    <p>Êtes-vous sûr de vouloir supprimer la tâche <?= $task['title'] ?> ?</p>
    <a href="/delete-task.php?action=delete&id=<?= $task['id'] ?>">Oui</a>
    <a href="/tasks.php">Non</a>
<?php require_once("./includes/footer.html.php") ?>