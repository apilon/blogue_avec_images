<?php

require_once 'Modele/Article.php';

$tstArticle = new Article;
$articles = $tstArticle->getArticles();
echo '<h3>Test getArticles : </h3>';
var_dump($articles->rowCount());

echo '<h3>Test getArticle : </h3>';
$article =  $tstArticle->getArticle(1);
var_dump($article);