<?php
/**
 * Structure URL
 * <protocol>://<hostname>:<port>/<path>?<query_params>#<anchor>
 * <hostname> = <sub_domain>.<domaine_name>.<extension>
 * <query_params> = <param_name>=<param_value>&<param_name>=<param_value>
 */
echo "<pre>";
var_dump($_GET);
var_dump($_POST);
var_dump($_REQUEST);
var_dump($_SERVER);
echo "</pre>";

$user = [
    "firstname" => "John",
    "lastname" => "Doe",
];
$tasks = [
    [
        "title"=> "dormir",
        "completed"=> true,
    ],
    [
        "title"=> "manger",
        "completed"=> false
    ],
    [
        "title"=> "travailler",
        "completed"=> true
    ]
];
$pageTitle = "Liste de tâches";

if(!isset($_GET['status'])) {
    $_GET['status'] = "";
}
if(!isset($_POST['status'])) {
    $_POST['status'] = "";
}
$filterCompleted = $_GET['status'] === 'completed';
$filterCompletedPOST = $_POST['status'] === 'completed';

?>
<?php
require_once('./includes/start_html.php');
require_once('./includes/header.php');
?>
    <main>
        <h1>Liste de tâches filtered using GET</h1>
        <h2>Filtre par liens</h2>
        <a href="./tasklist.php">Filtre all</a>
        <a href="./tasklist.php?status=completed">Filtre completed</a>
        <a href="./tasklist.php?status=not-completed">Filtre not completed</a>
        <h2>Filtre par form</h2>
        <form action="" method="GET">
            <input id="filtreStatusCompleted" 
                type="radio" 
                name="status" 
                value="completed" 
                <?= $_GET['status'] === 'completed' ? 'checked' : '' ?>
            />
            <label for="filtreStatusCompleted">Completed</label>
            <input id="filtreStatusNotCompleted" 
                type="radio" 
                name="status" 
                value="not-completed" 
                <?= $_GET['status'] === 'not-completed' ? 'checked' : '' ?>
            />
            <label for="filtreStatusNotCompleted">Not Completed</label>
            <input id="filtreStatusAll" 
                type="radio" 
                name="status" 
                value="" 
                <?= $_GET['status'] === '' ? 'checked' : '' ?>
            />
            <label for="filtreStatusAll">All</label>
            <input type="submit" value="Filter"/>
        </form>
        <ul>
            <?php foreach($tasks as $task) : ?>
                <?php if ($_GET['status'] === "" || $task['completed'] === $filterCompleted): ?>
                    <?php require('./includes/task/taskItem.php'); ?>
               <?php endif; ?>
            <?php endforeach; ?>
        </ul>
        <h1>Liste de tâches filtered using POST</h1>
        <h2>Filtre par form</h2>
        <form action="" method="POST">
            <input id="filtreStatusCompletedPOST" 
                type="radio" 
                name="status" 
                value="completed" 
                <?= $_POST['status'] === 'completed' ? 'checked' : '' ?>
            />
            <label for="filtreStatusCompletedPOST">Completed</label>
            <input id="filtreStatusNotCompletedPOST" 
                type="radio" 
                name="status" 
                value="not-completed" 
                <?= $_POST['status'] === 'not-completed' ? 'checked' : '' ?>
            />
            <label for="filtreStatusNotCompletedPOST">Not Completed</label>
            <input id="filtreStatusAllPOST" 
                type="radio" 
                name="status" 
                value="" 
                <?= $_POST['status'] === '' ? 'checked' : '' ?>
            />
            <label for="filtreStatusAllPOST">All</label>
            <input type="submit" value="Filter"/>
        </form>
        <ul>
            <?php foreach($tasks as $task) : ?>
                <?php if ($_POST['status'] === "" || $task['completed'] === $filterCompletedPOST): ?>
                    <?php require('./includes/task/taskItem.php'); ?>
               <?php endif; ?>
            <?php endforeach; ?>
        </ul>
        <h1>Liste de tâches Not completed</h1>
        <ul>
            <?php foreach($tasks as $task) : ?>
                <?php if (!$task['completed']): ?>
                    <?php require('./includes/task/taskItem.php'); ?>
               <?php endif; ?>
            <?php endforeach; ?>
        </ul>
        <h1>Liste de tâches completed</h1>
        <ul>
            <?php foreach($tasks as $task) {
                if ($task['completed']) {
                    require('./includes/task/taskItem.php');
                }
            } ?>
        </ul>
    </main>
    <?php
    require_once('./includes/footer.php');
require_once('./includes/end_html.php');
?>