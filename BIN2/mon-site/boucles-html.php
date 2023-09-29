<?php

$usernames = ['John', 'Jane', 'Jack', 'Jill'];

$usernamesAndAge = [
    'John' => 25,
    'Jane' => 30,
    'Jack' => 35,
    'Jill' => 40
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- Foreach key/value with associative array -->
<table style="width: 100%">
    <caption>Foreach key/value with associative array</caption>
    <thead>
        <tr><th>User</th><th>Age</th></tr>
    </thead>
    <tbody>
        <?php foreach ($usernamesAndAge as $username => $age) : ?>
        <tr>
            <td><?= $username ?></td>
            <td><?= $age ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Boucle de filtrage -->
<table style="width: 100%">
    <caption>Boucle de filtrage</caption>
    <thead>
        <tr><th>Index</th><th>Username</th></tr>
    </thead>
    <tbody>
        <?php for ($i = 0; $i < count($usernames); ++$i) : ?>
            <?php if ($i % 2 !== 0) continue; ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $usernames[$i] ?></td>
            </tr>
        <?php endfor; ?>
    </tbody>
</table>

<table style="width: 100%">
    <caption>Boucle odd/even</caption>
    <thead>
        <tr><th>Index</th><th>Username</th></tr>
    </thead>
    <tbody>
        <?php for ($i = 0; $i < count($usernames); ++$i) : ?>
            <tr style="background-color: <?= $i % 2 !== 0 ? 'transparent' : "grey" ?>">
                <td><?= $i ?></td>
                <td><?= $usernames[$i] ?></td>
            </tr>
        <?php endfor; ?>
    </tbody>
</table>
</body>
</html>