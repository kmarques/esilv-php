<?php

    /**
     * Lister l'ensemble des tâches et
     * créer une action sur chaque tâche
     * pour pouvoir supprimer celle-ci
     */
    $tasks = [
        [
            "title" => "dormir",
            "completed" => true,
        ],
        [
            "title" => "manger",
            "completed" => false,
        ],
        [
            "title" => "travailler",
            "completed" => true,
        ]
    ];
    $theme = [
        "headerClass" => isset($_GET['headerClass']) ? $_GET['headerClass'] : ""
    ];
    $tasks = [
        [
            "title" => "dormir",
            "completed" => true,
        ],
        [
            "title" => "manger",
            "completed" => false,
        ],
        [
            "title" => "travailler",
            "completed" => true,
        ]
    ];
    $isCompleted = isset($_REQUEST['completed']) ? filter_var($_REQUEST['completed'], FILTER_VALIDATE_BOOLEAN) : null;


    require_once "./includes/start_html.php";
    require_once "./includes/header.php";
    ?>
    <style>
        <?php require_once "./includes/css/tasklist.css"; ?>
    </style>
    <main>
        <h1>Liste des tâches</h1>
        <?php require_once './includes/task/taskFilter.php' ?>
        <ul>
            <?php foreach($tasks as $task): ?>
                <?php if (
                    // si j'ai pas d'action c'est bon
                    !isset($_GET['action'])
                    // sinon si j'ai delete et que task->title !== name (elem cliqué)
                    || ($_GET['action']==="delete" && $_GET['name'] !== $task['title'])
                ) : ?>
                    <?php require "./includes/task/taskitemWithDelete.php"; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </main>
<?php
    require_once "./includes/footer.php";
    require_once "./includes/end_html.php";
    ?>