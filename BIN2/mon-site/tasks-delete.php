<?php

require_once "./lib/polyfill.php";
require_once "./lib/db.php";
//$tasks = json_decode(file_get_contents("./data.json"), true);


$stmt = $db->query('SELECT * FROM tasks WHERE id = ' . $_GET['delete'], PDO::FETCH_ASSOC);
$tasks = $stmt->fetchAll();

$stmt = $db->prepare('DELETE FROM tasks WHERE id = :id');
$stmt->execute(['id' => $_GET['delete']]);
//unset($tasks[intval($_GET['delete'])]);
//file_put_contents('./data.json', json_encode($tasks));
unset($_GET['delete']);

//header('Location: /tasks.php');
require_once('./includes/header.php');
?>
<ul>
    <?php foreach ($tasks as $index => $task) : ?>
        <li>
            <?php foreach($task as $key => $value) : ?>
                <?= $key ?> : <?= $value ?>
            <?php endforeach; ?>
        </li>
    <?php endforeach; ?>
</ul>
<?php require_once('./includes/footer.php'); ?>

