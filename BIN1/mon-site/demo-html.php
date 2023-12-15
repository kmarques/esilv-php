<?php
require('./includes/checkSession.php');

$table = [1, 2, 3, 4, 5, 6, 7, 8, 9];
$nbElements = count($table);

?>

<?php require('./includes/header.html.php') ?>
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