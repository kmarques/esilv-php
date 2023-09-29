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
            // $decision = $postId < 100 ? true : false;
            // $decision = $postId < 100;
            break;
        default:
            $decision = false;
            break;
    }

    return $decision;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Post deleted (If) : <?php if (deletePost(45)) : ?>
        true
        <?php else: ?>
            false
        <?php endif; ?>
    </p>
    <p>Post deleted (Switch) : <?php if (deletePostSwitch(45)) : ?>
        true
        <?php else: ?>
            false
        <?php endif; ?>
    </p>
</body>
</html>