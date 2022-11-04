<?php
    $user = [
        "firstname" => "John",
        "lastname" => "Doe",
    ];
    $pageTitle = "Profil utilisateur";
    ?>
<?php
    require_once('./includes/start_html.php');
    require_once('./includes/header.php');
    ?>
    <main>
        <h1>Mon profil</h1>
        <div>
            Firstname: <?= $user['firstname'] ?>
        </div>
        <div>
            Lastname: <?= $user['lastname'] ?>
        </div>
    </main>
<?php
    require_once('./includes/footer.php');
    require_once('./includes/end_html.php');
    ?>