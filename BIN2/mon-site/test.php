<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $pageTitle ?></title>
  </head>
  <body>
    <header>
      <nav><a href="/apropos">A propos</a><a href="/tasks.php">Tasks</a></nav>
    </header>
    <main>
      <?= $pageTitle ?>

      Content
    </main>
    <footer>
        @copy; <?= date("Y") ?> - Tous droits réservés
    </footer>
  </body>
</html>
