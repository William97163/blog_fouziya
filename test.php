<?php


?>

<div class="utilisateurs"> <h2>Utilisateur :</h2>
    <?php
    require_once './class/Utilisateurs.php';
    use class\Utilisateur;
    $utilisateurs = Utilisateur::fetchUtilisateurs();
    ?>
    <div>
        <?php
        foreach ($utilisateurs as $utilisateur){
            $utilisateur->display();
        }
        ?>
    </div>
</div>




<div class="commentaires"> <h2>Commentaire :</h2>
    <?php
    require_once './class/Commentaire.php';
    use class\Commentaire;
    $commentaires = Commentaire::fetchCommentaire();
    ?>
    <div>
        <?php
        foreach ($commentaires as $commentaire){
            $commentaire->display();
        }
        ?>
    </div>
</div>



<div class="posts"> <h2>Post :</h2>
    <?php
    require_once './class/Post.php';
    use class\Post;
    $posts = Post::fetchPost();
    ?>
    <div>
        <?php
        foreach ($posts as $post){
            $post->display();
        }
        ?>
    </div>
</div>