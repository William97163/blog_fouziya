<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Commentaire</title>
    <link rel="stylesheet" href="assets/css/comment.css">
</head>

<body>

    <!-- Le bouton qui déclenche l'affichage du pop-up -->
    <button id="openFormBtn" onclick="openForm()">Commentaire</button>

    <!-- Le pop-up du formulaire -->
    <div id="commentForm" class="form-popup">
        <form action="traitement_commentaire.php" method="post" class="form-container">
            <h2>Ajouter un Commentaire</h2>

            <!-- Champs du formulaire -->
            <label for="name"><b>Nom :</b></label>
            <input type="text" placeholder="Entrez votre nom" name="name" required>

            <label for="comment"><b>Commentaire :</b></label>
            <textarea placeholder="Votre commentaire" name="comment" required></textarea>

            <!-- Bouton de soumission -->
            <button type="submit" class="btn">Ajouter Commentaire</button>

            <!-- Bouton de fermeture du pop-up -->
            <button type="button" class="btn cancel" onclick="closeForm()">Fermer</button>
        </form>
    </div>

    <!-- Votre contenu HTML principal ici -->

    <script>
        // Fonction pour ouvrir le pop-up
        function openForm() {
            document.getElementById("commentForm").style.display = "block";
        }

        // Fonction pour fermer le pop-up
        function closeForm() {
            document.getElementById("commentForm").style.display = "none";
        }
    </script>

</body>

</html>
