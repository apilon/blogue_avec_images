<?php $this->titre = 'Le Blogue du prof'; ?>

<a href="Adminarticles/ajouter">
    <h2 class="titreArticle">Ajouter un article</h2>
</a>
<?php foreach ($articles as $article):
    ?>

    <article>
        <header>
            <a href="Adminarticles/lire/<?= $this->nettoyer($article['id']) ?>">
                <h1 class="titreArticle"><?= $this->nettoyer($article['titre']) ?></h1>
            </a>
            <strong class=""><?= $this->nettoyer($article['sous_titre']) ?></strong><br>
            par <?= $this->nettoyer($article['nom']) ?><br>
            <time><?= $this->nettoyer($article['date']) ?></time><br>
            <a href="Adminarticles/modifier/<?= $this->nettoyer($article['id']) ?>"> [modifier l'article]</a>
        </header>
    </article>
    <hr />
<?php endforeach; ?>    
