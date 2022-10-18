<?php

echo "Bonjour\n";

$simple = [1, 2, 3, 4, 5];

// Boucle sur tableau itératif
echo "Boucle sur tableau itératif\n";
foreach ($simple as $value) {
    echo $value . "\n";
}
//exo1
$simple = ["dormir", "manger", "travailler"];
//exo2
$assoc = [
    "ex1" => true,
    "ex2" => false
];
$simple = [
    [
        "title"=> "dormir",
        "completed"=> true,
    ],
    [
        "title"=> "manger",
        "completed"=> false
    ],
    [
        "title"=> "travailler",
        "completed"=> true
    ]
];
//exo4
$assoc = [
    "ex1" => [
        "completed"=>true,
        "auteur" => "toto"
    ],
    "ex2" => [
        "completed" => false,
        "auteur" => "tata"
    ]
];
$simple = [
    [
        "title"=> "dormir",
        "completed"=> true,
        "auteur" => "toto"
    ],
    [
        "title"=> "manger",
        "completed"=> false,
        "auteur" => "toto"
    ],
    [
        "title"=> "travailler",
        "completed"=> true,
        "auteur" => "toto"
    ]
];




$simple= [
    [
        "title" => "dormir",
        "completed" => true,
        "auteur" => 'Toto'
    ],
    [
        "title" => "manger",
        "completed" => false,
        "auteur" => 'Toto'
    ],
    [
        "title" => "coder",
        "completed" => false,
        "auteur" => 'Toto'
    ],
];
$assoc = [
    'dormir' => [
        'completed' => true,
        'auteur' => 'Toto'
    ],
    'manger' => [
        'completed' => false,
        'auteur' => 'Titi'
    ],
];
$isCompleted = false;
$filterOwner = "Ta";

echo "Boucle sur tableau associatif\n";
foreach ($assoc as $key => $value) {
    echo $key . ' => ' . var_export($value) . "<br/>";
}
