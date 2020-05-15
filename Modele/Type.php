<?php

require_once 'Framework/Modele.php';

/**
 * Fournit les services d'accès aux types d'articles 
 * 
 * @author André Pilon
 */
class Type extends Modele {

// Recherche les types répondant à l'autocomplete
    public function searchType($term) {
        $sql = 'SELECT type FROM types WHERE type LIKE :term';
        $stmt = $this->executerRequete($sql, ['term' => '%' . $term . '%']);

        while ($row = $stmt->fetch()) {
            $return_arr[] = $row['type'];
        }

        /* Toss back results as json encoded array. */
        return json_encode($return_arr);
    }

}
