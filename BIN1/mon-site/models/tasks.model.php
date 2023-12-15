<?php

function getTasks($db)
{
    $stmt = $db->query('SELECT * FROM tasks', PDO::FETCH_ASSOC);
    $tasks = $stmt->fetchAll();

    return array_map(function ($task) {
        $task['status'] = (bool) $task['status'];
        return $task;
    }, $tasks);
}

function addTask($db, $newTask)
{
    $newTask = [
        "title" => $newTask['title'],
        "status" => isset($newTask['status']) ? 1 : 0,
        "author" => $newTask['author'],
    ];

    $stmt = $db->prepare('INSERT INTO tasks (title, status, author) VALUES (:title, :status, :author)');
    $stmt->execute($newTask);
}

function deleteTask($db, $idTask)
{
    $stmt = $db->prepare('DELETE FROM tasks WHERE id = :id');
    $stmt->execute(['id' => $idTask]);
}

function getTask($db, $idTask)
{
    $stmt = $db->prepare('SELECT * FROM tasks WHERE id = :id');
    $stmt->execute(['id' => $idTask]);
    $task = $stmt->fetch();

    return $task;
}

// $tasks = [
//     ["title" => "Devoir", "status" => true, "author" => "User 1"],
//     ["title" => "Manger", "status" => false, "author" => "User 2"],
//     ["title" => "Cuisiner", "status" => true, "author" => "Titi 3"],
//     ["title" => "Pas dormir", "status" => false, "author" => "tutu 12"],
// ];
