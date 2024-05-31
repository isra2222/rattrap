document.getElementById('formEtudiant').addEventListener('submit', function(event) {
    event.preventDefault();

    var nom = document.getElementById('uname').value.trim();
    var prenom = document.getElementById('pnom').value.trim();
    var promotion = document.getElementById('etudiant').value.trim();
    var specialite = document.getElementById('spe').value.trim();
    var debutPromotion = document.getElementById('debens').value.trim();
    var finPromotion = document.getElementById('finens').value.trim();

    if (nom.length !== 0 && prenom.length !== 0 && promotion !== "" && specialite !== "" && debutPromotion !== "" && finPromotion !== "") {
        this.submit();
    } else {
        alert("Veuillez remplir correctement tous les champs du formulaire.");
    }
});