<?php $this->titre = 'Le Blogue du prof'; ?>

<?php foreach ($articles as $article):
    ?>
    <article>
        <header>
            <a href="Articles/lire/<?= $this->nettoyer($article['id']) ?>">
                <h1 class="titreArticle"><?= $this->nettoyer($article['titre']) ?></h1>
            </a>
            <strong class=""><?= $this->nettoyer($article['sous_titre']) ?></strong><br>
            par <?= $this->nettoyer($article['nom']) ?><br>
            <time><?= $this->nettoyer($article['date']) ?></time>
        </header>
    </article>
    <hr />
<?php endforeach; ?>    
