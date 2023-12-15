<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $pageTitle ?></title>
    </head>
    <body>
        <nav>
            <ul>
                <li><a href="/contact.html.php">Contact</a></li>
                <li><a href="/tasks.php">Tasks</a></li>
                <li><a href="/profile.php">Profil</a></li>
                <?php if (isset($_SESSION['USER_ID'])) : ?><li><a href="/logout.php">Logout</a></li><?php endif; ?>
            </ul>
            <?php if (isset($_SESSION['USER_ID'])) : ?><span><?= $USER['email'] ?></span><?php endif; ?>
        </nav>
        <header>
            Super Site
        </header>
        <main>