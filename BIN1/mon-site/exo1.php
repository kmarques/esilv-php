<?php

$simple = ["dormir", "manger", "travailler"];

echo "<h3>Exo 1</h3>";
//Afficher une liste de tâches contenus dans un tableau simple
echo "<ul>";
foreach ($simple as $value) {
    echo "<li>$value</li>";
    //echo "<li>".$value."</li>";
}
echo "</ul>";

echo "<h3>Exo 2</h3>";
//Afficher une liste de tâches ainsi que son statut completed (bool)
// contenus dans un tableau associatif
$simple = [
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

echo "with if <ul>";
foreach ($simple as $task) {
    echo "<li>{$task['title']} - ";
    if ($task['completed']) {
        echo "done";
    } else {
        echo "not done";
    }
    echo "</li>";
}
echo "</ul>";

echo "with ternary operator <ol>";
foreach ($simple as $task) {
    echo "<li>{$task['title']} - "
    . ($task['completed'] ? "done" : "not done")
    . "</li>";
}
echo "</ol>";


echo "<h3>Exo 3</h3>";
//Selon la valeur de la variable isCompleted (bool),
// afficher une liste de tâches ainsi que son statut completed
// contenus dans un tableau associatif uniquement si son statut vaut
// la variable isCompleted
$isCompleted = true;
$simple = [
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
echo "with isCompleted value (true) <ol>";
foreach ($simple as $task) {
    if ($isCompleted !== $task['completed']) {
        continue;
    }
    echo "<li>{$task['title']} - "
    . ($task['completed'] ? "done" : "not done")
    . "</li>";
}
echo "</ol>";

echo "with inversed isCompleted value (false)<ol>";
foreach ($simple as $task) {
    if (!$isCompleted !== $task['completed']) {
        continue;
    }
    echo "<li>{$task['title']} - "
    . ($task['completed'] ? "done" : "not done")
    . "</li>";
}
echo "</ol>";
