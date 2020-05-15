<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Type.php';

class ControleurTypes extends Controleur {

    private $type;

    public function __construct() {
        $this->type = new Type();
    }

// recherche et retourne les types pour l'autocomplete
    public function index() {
        $term = $this->requete->getParametre('term');
        echo $this->type->searchType($term);
    }

}
