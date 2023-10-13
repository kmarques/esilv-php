<?php

$table = [1, 2, 3, 4, 5, 6, 7, 8, 9];
$nbElements = count($table);

?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>
    <p>
        <?php if ($nbElements === 0) : ?>
            Il n'y a pas de données dans le tableau
        <?php else : ?>
            Il y a <?= $nbElements === 1 ? "1 élément" : $nbElements . " éléments" ?> dans mon tableau
        <?php endif; ?>
    </p>
    <ul>
        <?php foreach($table as $item) : ?>
            <li><?= $item ?></li>
        <?php endforeach; ?>
    </ul>
    <ul>
        <?php foreach($table as $index => $name) : ?>
            <?php if ($index % 2 !== 0) {
                continue;
            } ?>
            <li><?= $name ?></li>
        <?php endforeach; ?>
    </ul>
    <ul>
        <?php foreach($table as $index => $name) : ?>
            <?php if ($name === "loulou") {
                break;
            } ?>
            <li><?= $name ?> is not Loulou</li>
        <?php endforeach; ?>
        Loulou found at index <?= $index ?>
    </ul>
 </body>
 </html>