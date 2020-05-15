<?php

require_once 'Modele/Commentaire.php';

$tstCommentaire = new Commentaire;
$commentaires = $tstCommentaire->getCommentaires(1);
echo '<h3>Test getCommentaires : </h3>';
var_dump($commentaires->rowCount());

$commentaire = $tstCommentaire->getCommentaire(5);
echo '<h3>Test getCommentaire : </h3>';
var_dump($commentaire);