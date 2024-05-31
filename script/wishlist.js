function toggleDropdown(index) 
{
  var dropdownMenu = document.getElementById('dropdownMenu_' + index); 
  dropdownMenu.classList.toggle('active');
}

// Appeler la fonction lors du redimensionnement de la fenêtre
window.onresize = adjustFooterPosition;

// Fonction pour afficher les entreprise de la page donnée
function showEntreprise(page) {
    window.location.href = "Wishlist.php?page=" + page;
}