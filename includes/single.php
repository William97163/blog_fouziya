<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/single.css">
</head>
<body>
<button id="addPostBtn">Add Post</button>
<div class="popup" id="postPopup">
    <div class="popup-content">
        <span class="close" onclick="closePopup()">&times;</span>
        <form action="http://localhost:5000/posts" method="POST">
            <label for="title">Titre de l'article :</label><br>
            <input type="text" id="title" name="title" required><br><br>

            <label for="contenu">Contenu de l'article :</label><br>
            <textarea id="contenu" name="contenu" rows="6" required></textarea><br><br>

            <input type="hidden" id="id_admin" name="id_admin" value="1" ><br><br>

            <input type="submit" value="Créer l'article">
        </form>
    </div>
</div>
<script src="assets/js/popup.js"></script>
</body>
</html>
