<?php

require_once 'Framework/Vue.php';
$articles = [
    [
        'id' => '991',
        'titre' => 'titre Test 1',
        'sous_titre' => 'sous-titre Test 1',
        'utilisateur_id' => '111',
        'date' => '2017-12-31',
        'texte' => 'texte Test 1',
        'type' => 'type Test 1'
    ],
    [
        'id' => '992',
        'titre' => 'titre Test 2',
        'sous_titre' => 'sous-titre Test 2',
        'utilisateur_id' => '111',
        'date' => '2017-12-31',
        'texte' => 'texte Test 2',
        'type' => 'type Test 2'
    ]
];
$vue = new Vue('index', 'Articles');
$vue->generer(['articles' => $articles], null);

