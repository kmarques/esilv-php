<?php
session_start();


if(!isset($_SESSION['alreadyVisited'])) {
    echo "Unknown visitor";
    $_SESSION['alreadyVisited'] = true;
} else {
    echo "Hi again";
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    //Tester l'utilisateur
    if (
        isset($_POST['username'])&&
        isset($_POST['password'])
    ) {
        if ($_POST['action'] === "login") {
            // Récupérer l'utilisateur
            require_once('./lib/db.php');
            $stmt = $db->prepare('SELECT * FROM app.users WHERE username = :username');
            $stmt->execute([
                'username' => $_POST['username']
            ]);
            $user = $stmt->fetch();
            if ($user) {
                // Tester le password
                if (password_verify($_POST['password'], $user['password'])) {
                    $_SESSION['USER'] = $user;
                } else {
                    $error = "Wrong credentials";
                }
            } else {
                $error = "Wrong credentials";
            }
        }
        if ($_POST['action'] === "register") {
            require_once('./lib/db.php');
            $stmt = $db->prepare('INSERT INTO users (username, password) values (:username, :password)');
            $stmt->execute([
                'username' => $_POST['username'],
                'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)
            ]);
            $error = "User created";
        }
    } else {
        $error = "Wrong credentials";
    }

    if(isset($_POST['comment'])) {
        $comment = $_POST['comment'];
    }
}

$isConnected = isset($_SESSION['USER']);
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
    <?php if (!$isConnected) : ?>
        <h2>Login</h2>
        <form method="POST">
            <input type="hidden" name="action" value="login">
            <input type="text" name="username" value="<?= $_POST['username'] ?? '' ?>">
            <input type="text" name="password" value="<?= $_POST['password'] ?? '' ?>">
            <input type="submit" value="Login">
        </form>
        <h2>REGISTER</h2>
        <form method="POST">
            <input type="hidden" name="action" value="register">
            <input type="text" name="username" value="<?= $_POST['username'] ?? '' ?>">
            <input type="text" name="password" value="<?= $_POST['password'] ?? '' ?>">
            <input type="submit" value="Login">
        </form>
        <?= isset($error) ? $error : '' ?>
    <?php else : ?>
        <h1>Welcome <?= $_SESSION['USER']["username"] ?></h1>
        <form method="POST">
            <input name="comment"/>
            <input type="submit" value="Send"/>
        </form>
        <?= $comment ?? '' ?>
        <a href="/logout.php">Logout</a>
    <?php endif; ?>
</body>
</html>