<?php

require_once('./includes/checkSession.php');
if ($USER) {
    header('Location: /demo.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require('./models/users.model.php');
    $result = register($db);
    if (is_string($result)) {
        $error = $result;
    } else {
        header('Location: /login.php');
        exit();
    }
}

?>
<h1>Register</h1>
<form method="post">
    <input type="text" name="email"/>
    <input type="password" name="password"/>
    <input type="Submit" value="Login"/>
</form>
<?php if(isset($error)): ?>
    <p>Invalid credentials</p>
<?php endif; ?>
<a href="/register.php">Créer un compte</a>