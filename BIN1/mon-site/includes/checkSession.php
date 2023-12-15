<?php

session_start();
require(__DIR__ . '/../models/db.php');

if (!isset($_SESSION['USER_ID'])) {
    $USER = null;
} else {
    require_once(__DIR__ . '/../models/users.model.php');
    if ($_SESSION['EXPIRATION_DATE'] < time()) {
        header('Location: /logout.php');
        exit;
    }
    $USER = getUser($db, $_SESSION["USER_ID"]);
}
