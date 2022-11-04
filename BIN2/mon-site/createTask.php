<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $task = [
        "title" => $_POST['title'],
        "completed" => isset($_POST['completed']) && filter_var($_POST['completed'], FILTER_VALIDATE_BOOL)
    ];
} else {
    $task = null;
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
        <?php if ($task !== null): ?>
            Tâche bien enregistrée
        <?php endif; ?>
    </main>
<?php
require_once "./includes/footer.php";
require_once "./includes/end_html.php";
?>