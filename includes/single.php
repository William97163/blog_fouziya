<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un nouvel article - Mon Blog</title>
    <link rel="stylesheet" href="assets/css/single.css">
</head>
<body>

<form action="traitement_creation_article.php" method="POST">
    <label for="title">Titre de l'article :</label><br>
    <input type="text" id="title" name="title" required><br><br>

    <label for="content">Contenu de l'article :</label><br>
    <textarea id="content" name="content" rows="6" required></textarea><br><br>

    <input type="submit" value="Créer l'article">
</form>

</body>
</html>
