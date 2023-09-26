<?php

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

echo "<p>Post deleted (If): ";
if(deletePost(45)) {
    echo "true";
} else {
    echo "false";
}
echo "</p>";

function deletePostSwitch(int $postId):bool {
    $role = "admin";
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

echo "<p>Post deleted (Switch): ";
if(deletePostSwitch(45)) {
    echo "true";
} else {
    echo "false";
}
echo "</p>";
