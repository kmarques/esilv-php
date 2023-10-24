<?php

/*
Afficher le numéro de chaque question avant les différents listings
1)Afficher une liste de tâches contenus dans un tableau simple
2)Afficher une liste de tâches ainsi que son statut completed (bool) contenus dans un tableau associatif
3)Selon la valeur de la variable isCompleted (bool), afficher une liste de tâches ainsi que son statut completed contenus dans un tableau associatif uniquement si son statut vaut la variable isCompleted
4)Afficher une liste de tâches ainsi que son statut completed et son auteur (string) contenus dans un tableau associatif
5)Selon la valeur de la variable isCompleted et filterOwner (string), afficher une liste de tâches ainsi que son statut completed et son auteur contenus dans un tableau associatif uniquement si son statut vaut la variable isCompleted et son auteur commence par filterOwner
6)Si le tableau associatif est vide, afficher “Aucune tâche créée”
7)Si après filtres aucun élément est affiché, alors afficher “Aucune tâche correspondant aux critères”
*/

// 1)Afficher une liste de tâches contenus dans un tableau simple
echo "<h2>1) Afficher une liste de tâches contenus dans un tableau simple</h2>";
$tasks = ["Devoir", "Manger", "Cuisiner", "Pas dormir"];
echo "<ul>";
foreach($tasks as $task) {
    echo "<li>$task</li>";
}
echo "</ul>";

// 2) Afficher une liste de tâches ainsi que son statut completed (bool) contenus dans un tableau associatif
echo "<h2>2) Afficher une liste de tâches ainsi que son statut completed (bool) contenus dans un tableau associatif</h2>";
$tasks = [
    ["title" => "Devoir", "status" => true],
    ["title" => "Manger", "status" => false],
    ["title" => "Cuisiner", "status" => true],
    ["title" => "Pas dormir", "status" => false],
];
echo "<ul>";
foreach($tasks as $task) {
    $status = $task['status'] ? "completed" : "not completed";
    echo "<li>{$task['title']} - $status</li>";
}
echo "</ul>";

// 3)Selon la valeur de la variable isCompleted (bool), afficher une liste de tâches ainsi que son statut completed contenus dans un tableau associatif uniquement si son statut vaut la variable isCompleted
echo "<h2>3)Selon la valeur de la variable isCompleted (bool), afficher une liste de tâches ainsi que son statut completed contenus dans un tableau associatif uniquement si son statut vaut la variable isCompleted</h2>";
$tasks = [
    ["title" => "Devoir", "status" => true],
    ["title" => "Manger", "status" => false],
    ["title" => "Cuisiner", "status" => true],
    ["title" => "Pas dormir", "status" => false],
];
$isCompleted = false;
echo "<ul>";
foreach($tasks as $task) {
    if ($task['status'] !== $isCompleted) {
        continue;
    }

    $status = $task['status'] ? "completed" : "not completed";
    echo "<li>{$task['title']} - $status</li>";
}
echo "</ul>";

// 4)Afficher une liste de tâches ainsi que son statut completed et son auteur (string) contenus dans un tableau associatif
echo "<h2>4)Afficher une liste de tâches ainsi que son statut completed et son auteur (string) contenus dans un tableau associatif</h2>";
$tasks = [
    ["title" => "Devoir", "status" => true, "author" => "User 1"],
    ["title" => "Devoir", "status" => true, "author" => "User 2"],
    ["title" => "Manger", "status" => false, "author" => "User 2"],
    ["title" => "Cuisiner", "status" => true, "author" => "User 3"],
    ["title" => "Pas dormir", "status" => false, "author" => "User 12"],
];
echo "<ul>";
foreach ($tasks as $task) {
    $status = $task['status'] ? "completed" : "not completed";
    echo "<li>{$task['title']} - $status - {$task['author']}</li>";
}
echo "</ul>";

// 5)Selon la valeur de la variable isCompleted et filterOwner (string), afficher une liste de tâches ainsi que son statut completed et son auteur contenus dans un tableau associatif uniquement si son statut vaut la variable isCompleted et son auteur commence par filterOwner
echo "<h2>5)Selon la valeur de la variable isCompleted et filterOwner (string), afficher une liste de tâches ainsi que son statut completed et son auteur contenus dans un tableau associatif uniquement si son statut vaut la variable isCompleted et son auteur commence par filterOwner</h2>";
$tasks = [
    ["title" => "Devoir", "status" => true, "author" => "User 1"],
    ["title" => "Manger", "status" => false, "author" => "User 2"],
    ["title" => "Cuisiner", "status" => true, "author" => "User 3"],
    ["title" => "Pas dormir", "status" => false, "author" => "User 12"],
];
$isCompleted = true;
$filterOwner = "User";
echo "<ul>";
foreach($tasks as $task) {
    if ($task['status'] !== $isCompleted || !str_starts_with($task['author'], $filterOwner)) {
        continue;
    }

    $status = $task['status'] ? "completed" : "not completed";
    echo "<li>{$task['title']} - $status - {$task['author']}</li>";
}
echo "</ul>";


// 6) Si le tableau associatif est vide, afficher “Aucune tâche créée”
echo "<h2>6) Si le tableau associatif est vide, afficher “Aucune tâche créée”</h2>";
$tasks = [
    ["title" => "Devoir", "status" => true, "author" => "User 1"],
    ["title" => "Manger", "status" => false, "author" => "User 2"],
    ["title" => "Cuisiner", "status" => true, "author" => "User 3"],
    ["title" => "Pas dormir", "status" => false, "author" => "User 12"],
];
$tasks = [];
if (empty($tasks)) {
    echo "Aucune tâche créée";
} else {
    $isCompleted = true;
    $filterOwner = "User";
    echo "<ul>";
    foreach($tasks as $task) {
        if ($task['status'] !== $isCompleted || !str_starts_with($task['author'], $filterOwner)) {
            continue;
        }

        $status = $task['status'] ? "completed" : "not completed";
        echo "<li>{$task['title']} - $status - {$task['author']}</li>";
    }
    echo "</ul>";
}


// 7) Si après filtres aucun élément est affiché, alors afficher “Aucune tâche correspondant aux critères”
echo "<h2>7) Si après filtres aucun élément est affiché, alors afficher “Aucune tâche correspondant aux critères”</h2>";
$tasks = [
    ["title" => "Devoir", "status" => true, "author" => "User 1"],
    ["title" => "Manger", "status" => false, "author" => "User 2"],
    ["title" => "Cuisiner", "status" => true, "author" => "User 3"],
    ["title" => "Pas dormir", "status" => false, "author" => "User 12"],
];
if (empty($tasks)) {
    echo "Aucune tâche créée";
} else {
    $isCompleted = true;
    $filterOwner = "UserZ";
    echo "<ul>";
    $displayed = false;
    foreach ($tasks as $task) {
        if ($task['status'] !== $isCompleted || !str_starts_with($task['author'], $filterOwner)) {
            continue;
        }
        
        $status = $task['status'] ? "completed" : "not completed";
        echo "<li>{$task['title']} - $status - {$task['author']}</li>";
        $displayed = true;
    }
    if (!$displayed) {
        echo "Aucune tâche correspondant aux critères";
    }
    echo "</ul>";
}
