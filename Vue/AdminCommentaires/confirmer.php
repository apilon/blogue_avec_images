<?php $this->titre = "Effacer - " . $this->nettoyer($commentaire['titre']); ?>

<article>
    <header>
        <p><h1>
            Effacer?
        </h1>
        <?= $this->nettoyer($commentaire['date']) ?>, <?= $this->nettoyer($commentaire['auteur']) ?> dit : (privé? <?= $this->nettoyer($commentaire['prive']) ?>)<br/>
        <strong><?= $this->nettoyer($commentaire['titre']) ?></strong><br/>
        <?= $this->nettoyer($commentaire['texte']) ?>
        </p>
    </header>
</article>

<form action="AdminCommentaires/supprimer" method="post">
    <input type="hidden" name="id" value="<?= $this->nettoyer($commentaire['id']) ?>" /><br />
    <input type="submit" value="Oui" />
</form>
<form action="Adminarticles/lire" method="post" >
    <input type="hidden" name="id" value="<?= $this->nettoyer($commentaire['article_id']) ?>" />
    <input type="submit" value="Annuler" />
</form>


