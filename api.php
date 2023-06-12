<?php 

$movies = [
    [
        'title' => 'Lord of The Rings',
        'year' => '2001',
        'genre' => 'Fantasy'
    ],
    [
        'title' => 'Titanic',
        'year' => '1997',
        'genre' => 'Drama'
    ],
    [
        'title' => 'Gladiator',
        'year' => '2000',
        'genre' => 'Action, Historical'
    ]
];

header('Content-Type: application/json');
echo json_encode($movies);

?>