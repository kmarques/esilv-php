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
function printCompleted($status)
{
    return $status ? 'completed' : 'not completed';
}
// 1)Afficher une liste de tâches contenus dans un tableau simple
$tasks = ["Faire la vaisselle", "Faire le ménage", "Faire la cuisine", "Faire la lessive", "Faire les courses"];
echo "<h2>1) Afficher une liste de tâches contenus dans un tableau simple</h2>";
echo "<ul>";
foreach($tasks as $taskName) {
    echo "<li>" . $taskName . "</li>";
}
echo "</ul>";

// 2)Afficher une liste de tâches ainsi que son statut completed (bool) contenus dans un tableau associatif
echo "<h2>2) Afficher une liste de tâches ainsi que son statut completed (bool) contenus dans un tableau associatif</h2>";
$tasks = [
    ["title" => "Faire la vaisselle", "status" => true],
    ["title" => "Faire le ménage", "status" => false],
    ["title" => "Faire la cuisine", "status" => true],
    ["title" => "Faire la lessive", "status" => false],
    ["title" => "Faire les courses", "status" => true],
];

echo "<ul>";
foreach($tasks as $task) {
    echo "<li>" . $task['title'] . " " . printCompleted($task["status"]) . "</li>";
}
echo "</ul>";

// 3)Selon la valeur de la variable isCompleted (bool), afficher une liste de tâches ainsi que son statut completed contenus dans un tableau associatif uniquement si son statut vaut la variable isCompleted
echo "<h2>3) Selon la valeur de la variable isCompleted (bool), afficher une liste de tâches ainsi que son statut completed contenus dans un tableau associatif uniquement si son statut vaut la variable isCompleted</h2>";
$tasks = [
    ["title" => "Faire la vaisselle", "status" => true],
    ["title" => "Faire le ménage", "status" => false],
    ["title" => "Faire la cuisine", "status" => true],
    ["title" => "Faire la lessive", "status" => false],
    ["title" => "Faire les courses", "status" => true],
];
$isCompleted = false;

echo "<ul>";
foreach($tasks as $task) {
    if ($task['status'] !== $isCompleted) {
        continue;
    }
    echo "<li>" . $task['title'] . " " . printCompleted($task["status"]) . "</li>";
}
echo "</ul>";

// 4)Afficher une liste de tâches ainsi que son statut completed et son auteur (string) contenus dans un tableau associatif
echo "<h2>4) Afficher une liste de tâches ainsi que son statut completed et son auteur (string) contenus dans un tableau associatif</h2>";
$tasks = [
    ["title" => "Faire la vaisselle", "status" => true, "author" => "Antoine"],
    ["title" => "Faire le ménage", "status" => false, "author" => "Hippolyte"],
    ["title" => "Faire la cuisine", "status" => true, "author" => "Ahmed"],
    ["title" => "Faire la lessive", "status" => false, "author" => "Antony"],
    ["title" => "Faire les courses", "status" => true, "author" => "Brian"],
];

echo "<ul>";
foreach($tasks as $task) {
    echo "<li>" . $task['title'] . " " . printCompleted($task["status"]) . " " . $task['author'] . "</li>";
}
echo "</ul>";

// 5)Selon la valeur de la variable isCompleted et filterOwner (string), afficher une liste de tâches ainsi que son statut completed et son auteur contenus dans un tableau associatif uniquement si son statut vaut la variable isCompleted et son auteur commence par filterOwner
echo "<h2>5) Selon la valeur de la variable isCompleted et filterOwner (string), afficher une liste de tâches ainsi que son statut completed et son auteur contenus dans un tableau associatif uniquement si son statut vaut la variable isCompleted et son auteur commence par filterOwner";
$tasks = [
    ["title" => "Faire la vaisselle", "status" => true, "author" => "Antoine"],
    ["title" => "Faire le ménage", "status" => false, "author" => "Hippolyte"],
    ["title" => "Faire la cuisine", "status" => true, "author" => "Ahmed"],
    ["title" => "Faire la lessive", "status" => true, "author" => "Antony"],
    ["title" => "Faire les courses", "status" => true, "author" => "Brian"],
];
$isCompleted = true;
$filterOwner = "Anto";

echo "<ul>";
foreach($tasks as $task) {
    if ($task['status'] !== $isCompleted || !str_starts_with($task['author'], $filterOwner)) {
        continue;
    }
    echo "<li>" . $task['title'] . " " . printCompleted($task["status"]) . " " . $task['author'] . "</li>";
}
echo "</ul>";

// 6)Si le tableau associatif est vide, afficher “Aucune tâche créée”
echo "<h2>6) Si le tableau associatif est vide, afficher “Aucune tâche créée”</h2>";
$tasks = [
    ["title" => "Faire la vaisselle", "status" => true, "author" => "Antoine"],
    ["title" => "Faire le ménage", "status" => false, "author" => "Hippolyte"],
    ["title" => "Faire la cuisine", "status" => true, "author" => "Ahmed"],
    ["title" => "Faire la lessive", "status" => true, "author" => "Antony"],
    ["title" => "Faire les courses", "status" => true, "author" => "Brian"],
];
$tasks = [];
if (empty($tasks)) {
    echo "Aucune tâche créée";
}
// Ou
if (count($tasks) === 0) {
    echo "Aucune tâche créée";
}

// 7)Si après filtres aucun élément est affiché, alors afficher “Aucune tâche correspondant aux critères”
echo "<h2>7) Si après filtres aucun élément est affiché, alors afficher “Aucune tâche correspondant aux critères”</h2>";
$tasks = [
    ["title" => "Faire la vaisselle", "status" => true, "author" => "Antoine"],
    ["title" => "Faire le ménage", "status" => false, "author" => "Hippolyte"],
    ["title" => "Faire la cuisine", "status" => true, "author" => "Ahmed"],
    ["title" => "Faire la lessive", "status" => true, "author" => "Antony"],
    ["title" => "Faire les courses", "status" => true, "author" => "Brian"],
];
$tasks = [];
if (empty($tasks)) {
    echo "Aucune tâche créée";
} else {
    $isCompleted = true;
    $filterOwner = "Antor";

    $foundValue = false;
    echo "<ul>";
    foreach($tasks as $task) {
        if ($task['status'] !== $isCompleted || !str_starts_with($task['author'], $filterOwner)) {
            continue;
        }
        echo "<li>" . $task['title'] . " " . printCompleted($task["status"]) . " " . $task['author'] . "</li>";
        $foundValue = true;
    }
    echo "</ul>";
    if (!$foundValue) {
        echo "Aucune tâche correspondant aux critères";
    }
}