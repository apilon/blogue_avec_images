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
    <?php if ($commentaire['efface'] == '0') : ?>
        <?= $this->nettoyer($commentaire['prive']) ? '<p class="prive">' : '<p>'; ?>
        <a href="AdminCommentaires/confirmer/<?= $this->nettoyer($commentaire['id']) ?>" >
            [Effacer]</a>
        <?= $this->nettoyer($commentaire['date']) ?>, <?= $this->nettoyer($commentaire['auteur']) ?> dit : <?= $this->nettoyer($commentaire['prive']) ? '(EN PRIVÉ)' : '' ?><br/>
        <strong><?= $this->nettoyer($commentaire['titre']) ?></strong><br/>
        <?= $this->nettoyer($commentaire['texte']) ?>
        </p>
    <?php else : ?>
        <p class="efface"><a href="AdminCommentaires/retablir/<?= $this->nettoyer($commentaire['id']) ?>" >
                [Rétablir]</a>
            Commentaire du <?= $this->nettoyer($commentaire['date']) ?>, par <?= $this->nettoyer($commentaire['auteur']) ?> <?= $this->nettoyer($commentaire['prive']) ? '(EN PRIVÉ)' : '' ?> effacé!
        </p>
    <?php endif; ?>
<?php endforeach; ?>



