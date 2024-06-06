function toggleDropdown(index) 
{
  var dropdownMenu = document.getElementById('dropdownMenu_' + index); 
  dropdownMenu.classList.toggle('active');
}

function rechercher() 
{
    var nom = document.getElementById('nom').value;
    var prenom = document.getElementById('prenom').value;
    var classe = document.getElementById('classe').value;
}

// Fonction pour afficher les étudiants de la page donnée
function showStudents(page) {
    window.location.href = "Liste_etudiant.php?page=" + page;
}