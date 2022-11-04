<?php
$pageTitle = "Créer une tâche";

var_dump($_POST);

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $task = [
        'title' => $_POST['title'],
        'completed' => isset($_POST['completed'])
    ];
} else {
    $task = null;
}

?>
<?php
require_once('./includes/start_html.php');
require_once('./includes/header.php');
?>
    <main>
        <form action="" method="POST">
            <input name="title" type="text"/>
            <input name="completed" type="checkbox"/>
            <input type="submit" value="Create"/>
        </form>
        <?php if($task !== null): ?>
            Task bien créée
        <?php endif; ?>
    </main>
    <?php
    require_once('./includes/footer.php');
require_once('./includes/end_html.php');
?>