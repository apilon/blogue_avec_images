<!-- Affichage -->
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <base href="<?= $racineWeb ?>" >
        <link rel="stylesheet" href="Contenu/css/style.css" />
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
        <title><?= $titre ?></title>   <!-- Élément spécifique -->
    </head>
    <body>
        <div id="global">
            <header>
                <a href="index.php"><h1 id="titreBlog">Le Blogue du prof v2.1.0.1</h1></a>
                <p>Version avec images associées aux articles</p>
                <a href="<?= $utilisateur != '' ? 'Admin' : ''; ?>Commentaires">
                    <h4>Afficher tous les commentaires de tous les articles</h4>
                </a>
                <a href="apropos">
                    <h4>À propos</h4>
                </a>
            </header>
            <?php if ($utilisateur != '') : ?>
                <h3>Bonjour <?= $utilisateur ?>,
                    <a href="Utilisateurs/deconnecter"><small>[Se déconnecter]</small></a>
                </h3>
            <?php else : ?>
            <h3>[<a href="Utilisateurs/index">Se connecter</a>] <small>(admin/admin)</small></h3>
            <?php endif; ?>
            <div id="contenu">
                <?= $contenu ?>   <!-- Élément spécifique -->
            </div> <!-- #contenu -->
            <footer id="piedBlog">
                Blog réalisé avec PHP, HTML5 et CSS.
            </footer>
        </div> <!-- #global -->
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
        <script type="text/javascript" src="Contenu/js/autocompleteType.js"></script>
    </body>
</html>



