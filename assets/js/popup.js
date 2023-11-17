// Fonction pour afficher la popup
function openPopup() {
    document.getElementById('postPopup').style.display = 'flex';
}

// Fonction pour fermer la popup
function closePopup() {
    document.getElementById('postPopup').style.display = 'none';
}

// Événement sur le clic du bouton "Add Post"
document.getElementById('addPostBtn').addEventListener('click', openPopup);