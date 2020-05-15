<?php $this->titre = "Le Blogue du prof - " . $this->nettoyer($article['titre']); ?>

<article>
    <header>
        <h1 class="titreArticle"><?= $this->nettoyer($article['titre']) ?></h1>
        <time><?= $this->nettoyer($article['date']) ?></time>, par <?= $this->nettoyer($article['nom']) ?>
        <h3 class=""><?= $this->nettoyer($article['sous_titre']) ?></h3>
    </header>
    <p><?= $this->nettoyer($article['texte']) ?></p>
    <?php
    if ($article['image'] != "") {
        echo '<img src="' . 'Contenu/images/articles/' . $article['image'] . '">';
    }
    ?> 
    <p><?= $this->nettoyer($article['type']) ?></p>
</article>
<hr />
<header>
    <h1 id="titreReponses">Réponses à <?= $this->nettoyer($article['titre']) ?> :</h1>
</header>
<?= ($commentaires->rowCount() == 0) ? '<p class="message">Pas encore de commentaires pour cet article.</p>' : '' ?>
<?php
foreach ($commentaires as $commentaire):
    ?>
    <p>
        <?= $this->nettoyer($commentaire['date']) ?>, <?= $this->nettoyer($commentaire['auteur']) ?> dit :<br/>
        <strong><?= $this->nettoyer($commentaire['titre']) ?></strong><br/>
        <?= $this->nettoyer($commentaire['texte']) ?>
    </p>
<?php endforeach; ?>

<form action="Commentaires/ajouter" method="post">
    <h2>Ajouter un commentaire</h2>
    <p>
        <label for="auteur">Courriel de l'auteur (xxx@yyy.zz)</label> : <input type="text" name="auteur" id="auteur" /> 
        <?= ($erreur == 'courriel') ? '<span style="color : red;">Entrez un courriel valide s.v.p.</span>' : '' ?> 
        <br />
        <label for="texte">Titre</label> :  <input type="text" name="titre" id="titre" /><br />
        <label for="texte">Commentaire</label> :  <textarea type="text" name="texte" id="texte" >Écrivez votre commentaire ici</textarea><br />
        <label for="prive">Privé?</label><input type="checkbox" name="prive" />
        <input type="hidden" name="article_id" value="<?= $this->nettoyer($article['id']) ?>" /><br />
        <input type="submit" value="Envoyer" />
    </p>
</form>


