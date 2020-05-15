<?php

require_once 'Controleur/ControleurAdmin.php';
require_once 'Modele/Article.php';
require_once 'Modele/Commentaire.php';

class ControleurAdminArticles extends ControleurAdmin {

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
        $commentaires = $this->commentaire->getCommentaires($idArticle);
        $this->genererVue(['article' => $article, 'commentaires' => $commentaires, 'erreur' => $erreur]);
    }

    public function ajouter() {
        $vue = new Vue("Ajouter");
        $this->genererVue();
    }

// Enregistre le nouvel article et retourne à la liste des articles
    public function nouvelArticle() {
        if ($this->requete->getSession()->getAttribut("env") == 'prod') {
            $this->requete->getSession()->setAttribut("message", "Ajouter un article n'est pas permis en démonstration");
        } else {
            $article['utilisateur_id'] = $this->requete->getParametreId('utilisateur_id');
            $article['titre'] = $this->requete->getParametre('titre');
            $article['sous_titre'] = $this->requete->getParametre('sous_titre');
            $article['texte'] = $this->requete->getParametre('texte');
            $article['type'] = $this->requete->getParametre('type');
            $article['image'] = $this->requete->getParametre('image');
            $this->article->setArticle($article);
            $this->executerAction('index');
        }
    }

// Modifier un article existant    
    public function modifier() {
        $id = $this->requete->getParametreId('id');
        $article = $this->article->getArticle($id);
        $this->genererVue(['article' => $article]);
    }

// Enregistre l'article modifié et retourne à la liste des articles
    public function miseAJour() {
        if ($this->requete->getSession()->getAttribut("env") == 'prod') {
            $this->requete->getSession()->setAttribut("message", "Modifier un article n'est pas permis en démonstration");
        } else {
            $article['id'] = $this->requete->getParametreId('id');
            $article['utilisateur_id'] = $this->requete->getParametreId('utilisateur_id');
            $article['titre'] = $this->requete->getParametre('titre');
            $article['sous_titre'] = $this->requete->getParametre('sous_titre');
            $article['texte'] = $this->requete->getParametre('texte');
            $article['type'] = $this->requete->getParametre('type');
            $this->article->updateArticle($article);
            $this->executerAction('index');
        }
    }

}
