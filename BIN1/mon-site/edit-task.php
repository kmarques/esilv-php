<?php
session_start();

require_once('models/tasks.model.php');

// CONTROLLER
$pageTitle = "Edit Task";

$found = null;
foreach ($tasks as $task) {
    if ($task['title'] === $_GET['title']) {
        $found = $task;
        break;
    }
}

if ($found) {
    $startStatus = $found['status'] ? "completed" : "not completed";
    $endStatus = $found['status'] ? "not completed" : "completed";
}

?>
<!-- VUE -->
<?php require_once("./includes/header.html.php") ?>
    <?php if ($found) : ?>
        <p>Êtes-vous sûr de vouloir passer la tâche <?= $_GET['title'] ?> de "<?= $startStatus ?>" à "<?= $endStatus ?>"?</p>
        <a href="/tasks.php?action=edit&title=<?= $_GET['title'] ?>">Oui</a>
        <a href="/tasks.php">Non</a>
    <?php else : ?>
        <p>La tâche <?= $_GET['title'] ?> n'existe pas</p>
    <?php endif; ?>
<?php require_once("./includes/footer.html.php") ?>
