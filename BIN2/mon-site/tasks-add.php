<?php

require_once "./lib/polyfill.php";
require_once "./lib/db.php";
//$tasks = json_decode(file_get_contents("./data.json"), true);

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $_POST['status'] = isset($_POST['status']) ? 1 : 0;
    //$tasks[] = $_POST;
    //file_put_contents('./data.json', json_encode($tasks));
    $stmt = $db->prepare('INSERT INTO tasks (title, status, author) VALUES (:title, :status, :author)');
    $stmt->execute($_POST);
    header('Location: /tasks.php');
}
$pageTitle = "Add Task";

?>

<?php require_once('./includes/header.php'); ?>
<form method="POST">
    <label for="title">Title ? </label><input type="text" id="title" name="title">
    <label for="status">Completed ? </label><input type="checkbox" id="status" name="status">
    <label for="author">Author ? </label><input type="text" id="author" name="author">
    <input type="submit" value="Add Task">
</form>
<?php require_once('./includes/footer.php'); ?>