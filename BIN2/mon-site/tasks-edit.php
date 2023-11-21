<?php

require_once "./lib/polyfill.php";

$tasks = json_decode(file_get_contents("./data.json"), true);

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $_POST['status'] = isset($_POST['status']);
    $tasks[$_GET['edit']] = $_POST;
    file_put_contents('./data.json', json_encode($tasks));
    header('Location: /tasks.php');
}
$pageTitle = "Edit Task " . $_GET['edit'];

?>

<?php require_once('./includes/header.php'); ?>
<form method="POST">
    <label for="title">Title ? </label><input type="text" id="title" name="title" value="<?= $tasks[$_GET['edit']]['title'] ?>">
    <label for="status">Completed ? </label><input type="checkbox" id="status" name="status" <?= $tasks[$_GET['edit']]['status'] ? "checked" : '' ?>>
    <label for="author">Author ? </label><input type="text" id="author" name="author" value="<?= $tasks[$_GET['edit']]['author'] ?>">
    <input type="submit" value="Edit Task">
</form>
<?php require_once('./includes/footer.php'); ?>