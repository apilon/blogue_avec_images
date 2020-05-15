<?php $this->titre = "Le Blogue du prof - " . $this->nettoyer($article['titre']); ?>

<header>
    <h1 id="titreReponses">Modifier un article de l'utilisateur 1 :</h1>
</header>
<form action="Adminarticles/miseAJour" method="post">
    <h2>Modifier un article</h2>
    <p>
        <label for="auteur">Titre</label> : <input type="text" name="titre" id="titre" value="<?= $this->nettoyer($article['titre']) ?>" /> <br />
        <label for="sous_titre">Sous-titre</label> :  <input type="text" name="sous_titre" id="sous_titre" value="<?= $this->nettoyer($article['sous_titre']) ?>" /><br />
        <label for="texte">Texte de l'article</label> :  <textarea name="texte" id="texte" ><?= $this->nettoyer($article['texte']) ?></textarea><br />
        <label for="type">Sujet</label> : <input type="text" name="type" id="auto" value="<?= $this->nettoyer($article['type']) ?>" /> <br />
        <input type="hidden" name="utilisateur_id" value="1" /><br />
        <input type="hidden" name="id" value="<?= $this->nettoyer($article['id']) ?>" /><br />
        <input type="submit" value="Modifier" />
    </p>
</form>


