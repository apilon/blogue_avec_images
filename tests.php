<?php
if (isset($_GET['test'])) {
    if ($_GET['test'] == 'modeleArticle') {
        require 'Tests/Modeles/testArticle.php';
    } else if ($_GET['test'] == 'modeleCommentaire') {
        require 'Tests/Modeles/testCommentaire.php';
    } else if ($_GET['test'] == 'vueArticles') {
        require 'Tests/Vues/testVueArticles.php';
    } else if ($_GET['test'] == 'vueConfirmer') {
        require 'Tests/Vues/testVueConfirmer.php';
    } else if ($_GET['test'] == 'vueErreur') {
        require 'Tests/Vues/testVueErreur.php';
    } else {
        echo '<h3>Test inexistant!!!</h3>';
    }
}
?>
<h3>Tests de Modèles</h3>
<ul>
    <li>
        <a href="tests.php?test=modeleArticle">Article</a>
    </li>
    <li>
        <a href="tests.php?test=modeleCommentaire">Commentaire</a>
    </li>
</ul>
<h3>Tests de Vues</h3>
<ul>
    <li>
        <a href="tests.php?test=vueArticles">Articles</a>
    </li>
    <li>
        <a href="tests.php?test=vueConfirmer">Confirmer</a>
    </li>
    <li>
        <a href="tests.php?test=vueErreur">Erreur</a>
    </li>
</ul>
