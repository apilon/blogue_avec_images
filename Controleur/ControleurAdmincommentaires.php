<?php

require_once 'Controleur/ControleurAdmin.php';
require_once 'Modele/Commentaire.php';

class ControleurAdminCommentaires extends ControleurAdmin {

    private $commentaire;

    public function __construct() {
        $this->commentaire = new Commentaire();
    }

// L'action index n'est pas utilisée mais pourrait ressembler à ceci 
// en ajoutant la fonctionnalité de faire afficher tous les commentaires
    public function index() {
        $commentaires = $this->commentaire->getCommentaires();
        $this->genererVue(['commentaires' => $commentaires]);
    }
  
// Confirmer la suppression d'un commentaire
    public function confirmer() {
        $id = $this->requete->getParametreId("id");
        // Lire le commentaire à l'aide du modèle
        $commentaire = $this->commentaire->getCommentaire($id);
        $this->genererVue(['commentaire' => $commentaire]);
    }

// Supprimer un commentaire
    public function supprimer() {
        $id = $this->requete->getParametreId("id");
        // Lire le commentaire afin d'obtenir le id de l'article associé
        $commentaire = $this->commentaire->getCommentaire($id);
        // Supprimer le commentaire à l'aide du modèle
        $this->commentaire->deleteCommentaire($id);
        //Recharger la page pour mettre à jour la liste des commentaires associés
        $this->rediriger('Adminarticles', 'lire/' . $commentaire['article_id']);
    }

    // Rétablir un commentaire
    public function retablir() {
        $id = $this->requete->getParametreId("id");
        // Lire le commentaire afin d'obtenir le id de l'article associé
        $commentaire = $this->commentaire->getCommentaire($id);
        // Supprimer le commentaire à l'aide du modèle
        $this->commentaire->restoreCommentaire($id);
        //Recharger la page pour mettre à jour la liste des commentaires associés
        $this->rediriger('Adminarticles', 'lire/' . $commentaire['article_id']);
    }

}
