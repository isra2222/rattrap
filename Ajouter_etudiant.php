<?php include "requete/verif.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width"/>
    <title>Ajouter Etudiant</title>
    <link rel="shortcut icon" href="Image/logo.png"/>
    <link rel="stylesheet" href="assets/style_form.css">
</head>

<body>
    <header>
        <?php include "header.php"; ?>
    </header>

    <div id="tableau">
        <span id="titre">
            Ajouter un étudiant
        </span>

        <div id="renseignement">
            <form id="formEtudiant" action="requete/creation_etudiant.php" method="post">
                <input type="text" id="uname" name="nom" placeholder="Nom*" size="50" required/>
                <input type="text" id="pnom" name="prenom" placeholder="Prénom*" size="50" required/>
                <input type="email" id="email" name="email" placeholder="Email*" size="50" required/>
                <input type="password" id="password" name="mot_de_passe" placeholder="Mot de passe*" size="50" required/>

                <select id="etudiant" name="promotion" required>
                    <option value="">Sélectionner la promotion*</option>
                    <?php
                        require 'connexion_bdd/creation_connexion.php';

                        $requete = "SELECT id_promotion, nom_promotion FROM promotion";
                        $result = $dbh->query($requete);

                        while ($colonne = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='" . $colonne['id_promotion'] . "'>" . $colonne['nom_promotion'] . "</option>";
                        }
                    ?>
                </select>

                <div class="dates">
                    <span class="dates">Date de début de promotion :*</span>
                    <input type="date" id="debens" name="debutens" required />
                </div>

                <div class="dates">
                    <span class="dates">Date de fin de promotion :*</span>
                    <input type="date" id="finens" name="finens" required/>
                </div>

                <input type="text" id="comp" name="competence" placeholder="Compétence" size="50" required/>

                <span id="champs">
                    * : Champs obligatoires
                </span>
                <div id="finir">
                    <button id="bouton" type="submit">
                        Ajouter un étudiant
                    </button>
                </div>
                <div id="message"></div>
            </form>
        </div>
    </div>

    <?php include "footer.php"; ?>

    <script>
        document.getElementById('formEtudiant').onsubmit = function(event) {
            event.preventDefault();
            var form = event.target;
            var formData = new FormData(form);
            var xhr = new XMLHttpRequest();
            xhr.open(form.method, form.action, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById('message').innerText = 'Étudiant ajouté avec succès';
                } else {
                    document.getElementById('message').innerText = 'Erreur lors de l\'ajout de l\'étudiant';
                }
            };
            xhr.send(formData);
        };
    </script>
</body>
</html>
