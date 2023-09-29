<?php

$usernames = ['John', 'Jane', 'Jack', 'Jill'];

$usernamesAndAge = [
    'John' => 25,
    'Jane' => 30,
    'Jack' => 35,
    'Jill' => 40
];

// Boucle avec accumulateur
echo "Boucle avec accumulateur<br>";
for ($i = 0; $i < count($usernames); ++$i) {
    echo "User ". ($i + 1) . " : ". $usernames[$i] . "<br>";
}

// Foreach simple
echo "<br>Foreach simple<br>";
foreach ($usernames as $username) {
    echo "User : " . $username . "<br>";
}
// Foreach key/value
echo "<br>Foreach key/value<br>";
foreach ($usernames as $index => $username) {
    echo "User " . ($index + 1) . " : " . $username . "<br>";
}

// Foreach key/value with associative array
echo "<br>Foreach key/value with associative array<br>";
foreach ($usernamesAndAge as $username => $age) {
    echo "User " . ($username) . " : " . $age . "<br>";
}

// Do while
echo "<br>Do while<br>";
$i = 0;
do {
    echo "User " . ($i + 1) . " : " . $usernames[$i] . "<br>";
} while(++$i < count($usernames));

// Do while
echo "<br>While<br>";
$i = 0;
while($i < count($usernames)) {
    echo "User " . ($i + 1) . " : " . $usernames[$i++] . "<br>";
} ;

// Boucle avec accumulateur
echo "<br>Boucle de recherche<br>";
for ($i = 0; $i < count($usernames); ++$i) {
    if ($usernames[$i] === "Jane") {
        break;
    }
}
echo "Jane found at index " . $i . "<br>";

// Boucle de filtrage
echo "<br>Boucle de filtrage<br>";
for ($i = 0; $i < count($usernames); ++$i) {
    if ($i % 2 !== 0) {
        continue;
    }
    echo "User " . $i . " : " . $usernames[$i] . "<br>";
}