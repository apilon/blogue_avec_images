<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Article.php';
require_once 'Modele/Commentaire.php';

class ControleurArticles extends Controleur {

    private $article;
    private $commentaire;

    public function __construct() {
        $this->article = new Article();
        $this->commentaire = new Commentaire();
    }

// Affiche la liste de tous les articles du blog
    public function index() {
        $articles = $this->article->getArticles();
        $this->genererVue(['articles' => $articles]);
    }

// Affiche les détails sur un article
    public function lire() {
        $idArticle = $this->requete->getParametreId("id");
        $article = $this->article->getArticle($idArticle);
        $erreur = $this->requete->getSession()->existeAttribut("erreur") ? $this->requete->getsession()->getAttribut("erreur") : '';
        $commentaires = $this->commentaire->getCommentairesPublics($idArticle);
        $this->genererVue(['article' => $article, 'commentaires' => $commentaires, 'erreur' => $erreur]);
    }

}
