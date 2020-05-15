<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Commentaire.php';

class ControleurCommentaires extends Controleur {

    private $commentaire;

    public function __construct() {
        $this->commentaire = new Commentaire();
    }

// L'action index n'est pas utilisée mais pourrait ressembler à ceci 
// en ajoutant la fonctionnalité de faire afficher tous les commentaires
    public function index() {
        $commentaires = $this->commentaire->getCommentairesPublics();
        $this->genererVue(['commentaires' => $commentaires]);
    }

// Ajoute un commentaire à un article
    public function ajouter() {
        $commentaire['article_id'] = $this->requete->getParametreId("article_id");
        $commentaire['auteur'] = $this->requete->getParametre('auteur');
        $validation_courriel = filter_var($commentaire['auteur'], FILTER_VALIDATE_EMAIL);
        if ($validation_courriel) {
            if ($this->requete->getSession()->getAttribut("env") == 'prod') {
                $this->requete->getSession()->setAttribut("message", "Ajouter un commentaire n'est pas permis en démonstration");
            } else {
                $commentaire['titre'] = $this->requete->getParametre('titre');
                $commentaire['texte'] = $this->requete->getParametre('texte');
                // Ajuster la valeur de la case à cocher
                $commentaire['prive'] = $this->requete->existeParametre('prive') ? 1 : 0;
                // Ajouter le commentaire à l'aide du modèle
                $this->commentaire->setCommentaire($commentaire);
            }
            // Éliminer un code d'erreur éventuel
            if ($this->requete->getSession()->existeAttribut('erreur')) {
                $this->requete->getsession()->setAttribut('erreur', '');
            }
            //Recharger la page pour mettre à jour la liste des commentaires associés
            $this->rediriger('Articles', 'lire/' . $commentaire['article_id']);
        } else {
            //Recharger la page avec une erreur près du courriel
            $this->requete->getSession()->setAttribut('erreur', 'courriel');
            $this->rediriger('Articles', 'lire/' . $commentaire['article_id']);
        }
    }

}
