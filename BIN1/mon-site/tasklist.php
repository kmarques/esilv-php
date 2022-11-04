<?php
/**
 * Structure URL
 * <protocol>://<hostname>:<port>/<path>?<query_params>#<anchor>
 * <hostname> = <sub_domain>.<domaine_name>.<extension>
 * <query_params> = <param_name>=<param_value>&<param_name>=<param_value>
 */

var_dump($_GET);
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
$filterCompleted = $_GET['status'] === 'completed';
?>
<?php
require_once('./includes/start_html.php');
require_once('./includes/header.php');
?>
    <main>
        <h1>Liste de tâches filtered</h1>
        <ul>
            <?php foreach($tasks as $task) : ?>
                <?php if ($task['completed'] === $filterCompleted): ?>
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