<?php


function getUser($db, $id)
{
    $stmt = $db->query('SELECT * FROM user_account WHERE id=' . $id);
    return $stmt->fetch();
}

function login($db)
{
    $stmt = $db->prepare('SELECT * FROM user_account WHERE email = :email');
    $stmt->execute(['email' => $_POST['email']]);
    $user = $stmt->fetch();

    if (!$user) {
        return false;
    }

    if (!password_verify($_POST['password'], $user['password'])) {
        return false;
    }

    return $user;
}

function register($db)
{
    $stmt = $db->prepare('SELECT * FROM user_account WHERE email = :email');
    $stmt->execute(['email' => $_POST['email']]);
    $user = $stmt->fetch();

    if ($user) {
        return "Email already in use";
    }

    $stmt = $db->prepare('INSERT INTO user_account (email, password) VALUES (:email, :password)');
    $stmt->execute([
        "email" => $_POST['email'],
        "password" => password_hash($_POST['password'], PASSWORD_BCRYPT)
    ]);
}
