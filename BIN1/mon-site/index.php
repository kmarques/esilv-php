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
    if ($credentials['username'] === "demo" && $credentials['password'] === "demo") {
        $_SESSION['user'] = array_merge(["id" => 1], $credentials);
    } else {
        echo "Wrong credentials";
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
        <form method="POST">
            <input name="username" value="<?= $_POST['username'] ?? '' ?>"/>
            <input name="password" value="<?= $_POST['password'] ?? '' ?>"/>
            <input type="submit" value="Submit"/>
        </form>
    <?php else : ?>
        <h1>Welcome <?= $user["username"] ?></h1>
        <a href="logout.php">Logout</a>
    <?php endif; ?>
</body>
</html>




