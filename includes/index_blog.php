<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Index du Blog</title>
    <link rel="stylesheet" href="./assets/css/index_blog.css">
</head>
<body>

<div class="container">
    <h1>Liste des Articles</h1>
    <?php
    include("includes/single.php")
    ?>
    <div class="blog-list">
        <?php
        // Simulation de données d'articles (vous devez remplacer cela par la récupération de données réelles depuis une source comme une base de données)
        $articles = array(
            array(
                'id' => 1,
                'title' => 'Premier article',
                'content' => 'Contenu du premier article...',
                'date' => '2023-11-15'
            ),
            array(
                'id' => 2,
                'title' => 'Deuxième article',
                'content' => 'Contenu du deuxième article...',
                'date' => '2023-11-14'
            ),
            // Ajoutez d'autres articles ici
        );

        // Affichage des articles
        foreach ($articles as $article) {
            ?>
            <div class="blog-post">
                <h2><?php echo $article['title']; ?></h2>
                <p><?php echo $article['content']; ?></p>
                <span class="date"><?php echo $article['date']; ?></span>
                <div class="btn">
                    <button class="btn_modify">modifier</button>
                    <button class="btn_delete">supprimer</button>
                    <button class="btn_liker">liker</button>
                    <button class="btn_comment">commenter</button>
                </div>
                <div class="likes">likes : </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>

</body>
</html>