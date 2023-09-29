<?php

$var1 = "Hello";
$var2 = "World";
function display (string $message): void {
    echo $message;
}

class Toto {
    public string $name;
}

echo $var1 . " " . $var2;