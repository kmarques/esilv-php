<?php

$var1 = "Hello";
$var2 = "World";
function display (string $message): void {
    echo $message;
}

class Toto {
    public string $name;
}

echo $var1 . " " . $var2;



function deletePost(int $postId):bool {
    $role = "user";

    if ($role === "admin") {
        return true;
    } else if ($role === "moderator" && $postId < 100){
        return true;
    } else {
        return false;
    }
}

function deletePostSwitch(int $postId):bool {
    $role = "moderator";
    $decision = null;
    switch($role) {
        case "admin":
            $decision = true;
            break;
        case "moderator":
            if ($postId < 100) {
                $decision = true;
            } else {
                $decision = false;
            }
            break;
        default:
            $decision = false;
            break;
    }

    return $decision;
}

function isModeratorValid($role, $postId) {
    if($role === "moderator" && $postId < 100) {
        return "moderator";
    } else {
        return null;
    }
    // return $role === "moderator" && $postId < 100 ? "moderator" : null;
}

function deletePostMatch(int $postId): bool {
    $role = "moderator";
    $decision = match($role) {
        "admin" => true,
        isModeratorValid($role, $postId) => true,
        default => false
    };

    return $decision;
}

echo "<br><br>Post deleted : " . deletePostMatch(100);

$isCompleted = true;
$task = [
    "dormier" => true,
    "manger" => false
];


$i = 0;

echo ++$i . " <= ++i";
echo $i . " <= i";
echo $i++ . " <= i++";
echo $i . " <= i";