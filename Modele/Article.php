<?php

require_once 'Framework/Modele.php';

/**
 * Fournit les services d'accès aux articles 
 * 
 * @author André Pilon
 */
class Article extends Modele {

// Renvoie la liste de tous les articles, triés par identifiant décroissant avec le nom de l'utilisateus lié
    public function getArticles() {
//        $sql = 'select articles.id, titre, sous_titre, utilisateur_id, date, texte, type, nom from articles, utilisateurs'
//                . ' where articles.utilisateur_id = utilisateurs.id order by ID desc';
        $sql = 'SELECT a.id,'
                . ' a.titre,'
                . ' a.sous_titre,'
                . ' a.utilisateur_id,'
                . ' a.date,'
                . ' a.texte,'
                . ' a.type,'
                . ' u.nom,'
                . ' u.identifiant'
                . ' FROM articles a'
                . ' INNER JOIN utilisateurs u'
                . ' ON a.utilisateur_id = u.id'
                . ' ORDER BY id desc';
        $articles = $this->executerRequete($sql);
        return $articles;
    }

// Renvoie la liste de tous les articles, triés par identifiant décroissant
    public function setArticle($article) {
        $fichierImage = $this->enregistrerImage($article['image']);
        $sql = 'INSERT INTO articles ('
                . ' titre,'
                . ' sous_titre,'
                . ' utilisateur_id,'
                . ' date,'
                . ' texte,'
                . ' type,'
                . ' image)'
                . ' VALUES(?, ?, ?, NOW(), ?, ?, ?)';
        $result = $this->executerRequete($sql, [
            $article['titre'],
            $article['sous_titre'],
            $article['utilisateur_id'],
            $article['texte'],
            $article['type'],
            $fichierImage
                ]
        );
        return $result;
    }

// Renvoie les informations sur un article avec le nom de l'utilisateur lié
    function getArticle($idArticle) {
        $sql = 'SELECT a.id,'
                . ' a.titre,'
                . ' a.sous_titre,'
                . ' a.utilisateur_id,'
                . ' a.date,'
                . ' a.texte,'
                . ' a.image,'
                . ' a.type,'
                . ' u.nom'
                . ' FROM articles a'
                . ' INNER JOIN utilisateurs u'
                . ' ON a.utilisateur_id = u.id'
                . ' WHERE a.id=?';
        $article = $this->executerRequete($sql, [$idArticle]);
        if ($article->rowCount() == 1) {
            return $article->fetch();  // Accès à la première ligne de résultat
        } else {
            throw new Exception("Aucun article ne correspond à l'identifiant '$idArticle'");
        }
    }

// Met à jour un article
    public function updateArticle($article) {
        $sql = 'UPDATE articles'
                . ' SET titre = ?,'
                . ' sous_titre = ?,'
                . ' utilisateur_id = ?,'
                . ' date = NOW(),'
                . ' texte = ?,'
                . ' type = ?'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [
            $article['titre'],
            $article['sous_titre'],
            $article['utilisateur_id'],
            $article['texte'],
            $article['type'],
            $article['id']
                ]
        );
        return $result;
    }

    // Enregistre une image associé à un article
    private function enregistrerImage($image) {
        // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
        if (isset($image) AND $image['error'] == 0) {
            // Testons si le fichier n'est pas trop gros
            $dimension = $image['size'];
            if ($dimension <= 1000000) {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($image['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees)) {
                    // On peut valider le fichier et le stocker définitivement
                    $fichierImage = 'Contenu/Images/articles' . basename($image['name']);
                    move_uploaded_file($image['tmp_name'], $fichierImage);
                    return basename($image['name']);
                } else {
                    throw new Exception("L'extension '$extension_upload' n'est pas autorisée pour les images");
                }
            } else {
                throw new Exception("Votre image ($dimension octets) dépasse la dimension autorisée (1000000 octets)");
            }
        } else {
            throw new Exception("Erreur rencontrée lors de la transmission du fichier");
        }
    }

}
