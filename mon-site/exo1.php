<?php

// Afficher une liste de tâches contenus dans un tableau simple
echo "<h1>Exo 1</h1>";
$tasks = ["dormir", "manger", "travailler"];
echo "<ul>";
for ($i=0; $i < count($tasks); $i++) {
    echo "<li>$tasks[$i]</li>";
    //echo "<li>".$tasks[$i]."</li>";
}
echo "</ul>";
foreach ($tasks as $task) {
    echo $task . "<br>";
}

// Afficher une liste de tâches ainsi que son statut completed (bool) contenus dans un tableau associatif
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
echo "<h1>Exo 2</h1>";
echo "<ul>";
foreach ($tasks as $task) {
    echo "<li>" . $task['title']. " - ";
    if ($task["completed"]) {
        echo "completed";
    } else {
        echo "not completed";
    }
    echo "</li>";
}
echo "</ul>";
echo "<ul>";
foreach ($tasks as $task) {
    echo "<li>" . $task['title']. " - " . (
        $task["completed"] ? "completed" : "not completed"
    ) . "</li>";
}
echo "</ul>";

// Selon la valeur de la variable isCompleted (bool),
// afficher une liste de tâches ainsi que son statut completed contenus dans un tableau associatif
// uniquement si son statut vaut la variable isCompleted
echo "<h1>Exo 3</h1>";
$isCompleted = false;
echo "<ul>";
foreach ($tasks as $task) {
    if ($task["completed"] === $isCompleted) {
        echo "<li>" . $task['title']. " - " . (
            $task["completed"] ? "completed" : "not completed"
        ) . "</li>";
    }
}
echo "</ul>";
