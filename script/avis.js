function toggleDropdown(index) 
{
  var dropdownMenu = document.getElementById('dropdownMenu_' + index); 
  dropdownMenu.classList.toggle('active');
}

// Appeler la fonction lors du redimensionnement de la fenêtre
window.onresize = adjustFooterPosition;

// Fonction pour afficher les entreprise de la page donnée
function showEntreprise(page) {
    window.location.href = "Avis.php?page=" + page;
}

window.onload = () => {
    // On va chercher toutes les étoiles
    const stars = document.querySelectorAll(".la-star");
    
    // On va chercher l'input
    const note = document.querySelector("#note");

    // On boucle sur les étoiles pour le ajouter des écouteurs d'évènements
    for(star of stars){
        // On écoute le clic
        star.addEventListener("click", function(){
          resetStars();
            this.style.color = "#FCDC12";
            this.classList.add("las");
            this.classList.remove("lar");
            // L'élément précédent dans le DOM (de même niveau, balise soeur)
            let previousStar = this.previousElementSibling;

            while(previousStar){
                // On passe l'étoile qui précède en jaune
                previousStar.style.color = "#FCDC12";
                previousStar.classList.add("las");
                previousStar.classList.remove("lar");
                // On récupère l'étoile qui la précède
                previousStar = previousStar.previousElementSibling;
            }
        });
        };

    function resetStars(note = 0){
        for(star of stars){
            if(star.dataset.value > note){
                star.style.color = "black";
                star.classList.add("lar");
                star.classList.remove("las");
            }else{
                star.style.color = "#FCDC12";
                star.classList.add("las");
                star.classList.remove("lar");
            }
        }
    }
}