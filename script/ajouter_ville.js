document.getElementById('formCodePostal').addEventListener('submit', function(event) {
    event.preventDefault();

    var codePostal = document.getElementById('textboxCodePostal').value.trim();
    var adresse = document.getElementById('adresse').value.trim();
    var secteur = document.getElementById('secteur').value.trim();
    var nom = document.getElementById('nom').value.trim();

    if (codePostal.length === 5 && /^\d+$/.test(codePostal) && adresse.length !== 0 && nom.length !== 0 && secteur !== "") {
        this.submit();
    } else {
        alert("Veuillez remplir correctement tous les champs du formulaire.");
    }
});

document.getElementById('textboxCodePostal').addEventListener('input', function() {
    var codePostal = this.value.trim();

    if (codePostal.length === 5 && /^\d+$/.test(codePostal)) {
        fetchVilles(codePostal);
    } else {
        clearVilles();
    }
});

function fetchVilles(codePostal) {
    var xhr = new XMLHttpRequest();
    xhr.onload = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                var selectVilles = document.getElementById('selectVilles');
                selectVilles.innerHTML = '';

                if (response.length > 0) {
                    response.forEach(function(ville) {
                        var option = document.createElement('option');
                        option.textContent = ville.nomCommune;
                        selectVilles.appendChild(option);
                    });
                } else {
                    var option = document.createElement('option');
                    option.textContent = "Aucune ville trouvée pour le code postal saisi.";
                    selectVilles.appendChild(option);
                }
            } else {
                console.error('Erreur lors de la récupération des données de l\'API APICARTO. Statut : ' + xhr.status);
            }
        }
    };

    xhr.open('GET', 'https://apicarto.ign.fr/api/codes-postaux/communes/' + codePostal, true);
    xhr.send();
}

function clearVilles() {
    var selectVilles = document.getElementById('selectVilles');
    selectVilles.innerHTML = '';

    var option = document.createElement('option');
    option.textContent = 'Entrez un code postal valide';
    selectVilles.appendChild(option);
}