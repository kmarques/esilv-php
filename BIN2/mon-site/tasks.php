<?php

require_once "./lib/polyfill.php";

function printCompleted($status)
{
    return $status ? 'completed' : 'not completed';
}
$tasks = json_decode(file_get_contents("./data.json"), true);

$isCompleted = isset($_GET['completed']);
$filterOwner = isset($_GET['filterOwner']) ? $_GET['filterOwner'] : "";

$filteredValues = array_filter($tasks, function ($task) use ($isCompleted, $filterOwner) {
    return $task['status'] === $isCompleted && str_starts_with($task['author'], $filterOwner);
});

$pageTitle = "Tasks";

?>

<?php require('./includes/header.php'); ?>
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
                    <a href="/tasks-delete.php?delete=<?= $index ?>">Delete</a>
                    <a href="/tasks-edit.php?edit=<?= $index ?>">Edit</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
<?php endif; ?>
<a href="/tasks-add.php">Add task</a>
<?php require('./includes/footer.php'); ?>