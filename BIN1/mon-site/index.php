<?php
session_start();

if(!isset($_SESSION["coucou"])) {
    $_SESSION['coucou'] = 3;
    error_log('set session coucou');
} else {
    error_log('session coucou already set');
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $credentials = $_POST;
    $action = $credentials['action'];
    unset($credentials['action']);

    if($action === "comment") {
        $comment = $_POST['comment'];
    }
    if($action === "register") {
        require_once('./lib/db.php');
        $stmt = $db->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
        $stmt->execute([
            "username" => $credentials['username'],
            "password" => password_hash($credentials['password'], PASSWORD_BCRYPT)
        ]);
        echo "User registered";
    }
    if($action === "login") {
        require_once('./lib/db.php');
        $stmt = $db->prepare('SELECT * FROM users WHERE username = :username');
        $stmt->execute([
            "username" => $credentials['username'],
        ]);
        $user = $stmt->fetch();
        if(!$user) {
            echo "wrong credentials";
        } else {
            if (!password_verify($credentials['password'], $user['password'])) {
                echo "wrong credentials";
            } else {
                $_SESSION['user'] = $user;
            }
        }
    }
}

$isConnected = isset($_SESSION['user']);
$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(!$isConnected) : ?>
        <h1>Login</h1>
        <form method="POST">
            <input type="hidden" name="action" value="login"/>
            <input name="username" value="<?= $_POST['username'] ?? '' ?>"/>
            <input name="password" value="<?= $_POST['password'] ?? '' ?>"/>
            <input type="submit" value="Submit"/>
        </form>
        <h1>Register</h1>
        <form method="POST">
            <input type="hidden" name="action" value="register"/>
            <input name="username" value="<?= $_POST['username'] ?? '' ?>"/>
            <input name="password" value="<?= $_POST['password'] ?? '' ?>"/>
            <input type="submit" value="Submit"/>
        </form>
    <?php else : ?>
        <h1>Welcome <?= $user["username"] ?></h1>
        <form method="POST">
            <input type="hidden" name="action" value="comment"/>
            <input name="comment"/>
            <input type='submit' value="Send"/>
        </form>
        <?= $comment ?? '' ?>
        <a href="logout.php">Logout</a>
    <?php endif; ?>
</body>
</html>




