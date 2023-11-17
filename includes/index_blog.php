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
        <?php
        require_once './class/Post.php';
        use entity\Post;
        // Simulation de données d'articles (vous devez remplacer cela par la récupération de données réelles depuis une source comme une base de données)
        $articles = Post::fetchPost();
        ?>
                <?php

                    foreach ($articles as $article){

                ?>

                <div class="blog-list">
                    <div class="blog-post">
                    <h2><?php echo $article->title; ?></h2>
                    <p><?php echo $article->content; ?></p>
                    <span class="date"><?php echo $article->date; ?></span>
                    <div class="btn">
                        <button class="btn_modify">modifier</button>
                        <button class="btn_delete">supprimer</button>
                        <button class="btn_liker">liker</button>
                        <?php include("./includes/comment.php");?>
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