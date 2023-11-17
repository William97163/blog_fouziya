<main>
    <article class="post">
        <?php
        // Simulation de récupération de données depuis une base de données
        $article = [
            'title' => 'Titre de l\'article',
            'author' => 'Nom de l\'auteur',
            'date' => 'Date de publication',
            'content' => 'Contenu de l\'article ici...'
            // Ajoutez d'autres données de l'article si nécessaire
        ];
        ?>
        <h1><?php echo $article['title']; ?></h1>
        <div class="post-meta">
            <p>Par <?php echo $article['author']; ?> - <?php echo $article['date']; ?></p>
        </div>
        <div class="post-content">
            <p><?php echo $article['content']; ?></p>
            <!-- Le contenu de l'article sera affiché ici -->
        </div>
        <a href="#">Retour à la liste des articles</a>
    </article>
</main>
