<?php

require_once('./includes/checkSession.php');
if ($USER) {
    header('Location: /demo.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require('./models/users.model.php');
    $result = login($db);
    if ($result === false) {
        $error = 'Invalid credentials';
    } else {
        $_SESSION['USER_ID'] = $result['id'];
        $_SESSION['EXPIRATION_DATE'] = time() + 30; // Déconnexion après 30s
        header('Location: /tasks.php');
        exit();
    }
}

?>
<h1>Login</h1>
<form method="post">
    <input type="text" name="email"/>
    <input type="password" name="password"/>
    <input type="Submit" value="Login"/>
</form>
<?php if(isset($error)): ?>
    <p>Invalid credentials</p>
<?php endif; ?>
<a href="/register.php">Créer un compte</a>