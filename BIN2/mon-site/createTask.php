<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $task = [
        "title" => $_POST['title'],
        "completed" => isset($_POST['completed']) && filter_var($_POST['completed'], FILTER_VALIDATE_BOOL)
    ];
    require_once('./lib/db.php');
    $stmt = $db->prepare('INSERT INTO task (title, completed) VALUES (:title, :completed)');
    $result = $stmt->execute($task);
} else {
    // code for GET
}

require_once "./includes/start_html.php";
require_once "./includes/header.php";
?>
    <main>
        <form action="" method="POST">
            <label for="title">Titre</label>
            <input type="text" id="title" name="title">
            <label for="completed">Completed</label>
            <input type="checkbox" name="completed" value="true">
            <input type="submit" value="Submit">
        </form>
        <?php if (isset($result) && $result): ?>
            Tâche bien enregistrée
        <?php endif; ?>
    </main>
<?php
require_once "./includes/footer.php";
require_once "./includes/end_html.php";
?>