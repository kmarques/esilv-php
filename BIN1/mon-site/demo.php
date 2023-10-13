<?php

$var1 = "Hello";
$var2 = "World";
function display(string $message): void
{
    echo $message;
}

class Toto
{
    public string $name;
}

echo $var1 . " " . $var2;

$table = ["riri", "fifi", "loulou", "donald", "daisy"];

echo "<html>"
. "<head>"
. "<title>Mon site</title>"
. "</head>"
. "<body>";

if (count($table) === 0) {
    echo "<p>Il n'y a pas de données dans le tableau</p>";
} elseif (count($table) === 1) {
    echo "<p>Il y a 1 élement dans mon tableau</p>";
} else {
    echo "<p>Il y a " . count($table) . " élements dans mon tableau</p>";
}

$text = count($table) === 0
    ? "Il n'y a pas de données dans le tableau"
    : "Il y a "
        . (count($table) === 1 ? "1 élément" : count($table) . " élements")
        . " dans mon tableau";

echo "<p>" . $text . "</p>";

echo "<ul>";
foreach($table as $item) {
    echo "<li>" . $item . "</li>";
}
echo "</ul>";

echo "<ul>";
foreach($table as $index => $name) {
    if ($index % 2 !== 0) {
        continue;
    }
    echo "<li>" . $name . "</li>";
}
echo "</ul>";

echo "<p>";
foreach($table as $index => $name) {
    if ($name === "loulou") {
        break;
    } else {
        echo $name . " is not Loulou<br/>";
    }
}
echo "Loulou found at index " . $index;

echo "</p>";

echo "</body></html>";
