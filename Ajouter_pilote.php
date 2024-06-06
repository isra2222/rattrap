<?php include "requete/verif.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width"/>
        <title>Tinkièt'</title>
        <link rel="shortcut icon" href="Image/logo.png"/>
        <link rel="stylesheet" href="assets/style_ajouter_entreprise.css">
    </head>

    <body>
        <header>
            <?php include "header.php"; ?>
        </header>

        <div id="tableau">

            <span id="titre">
                Ajouter un pilote
            </span>

            <div id="renseignement">
                <form method="POST" action="requete/creation_pilote.php">

                    <input type="text" id="uname" name="nom" placeholder="Nom*" size="50" required/>

                    <input type="text" id="pnom" name="prenom" placeholder="Prénom*" size="50" required/>

                    <input type="email" id="email" name="email" placeholder="Email*" size="50" required/>

                    <input type="password" id="password" name="password" placeholder="Mot de passe*" size="50" required/>

                    <select id="pilote" name="promotion" required>
                        <option value="">Sélectionner la promotion*</option>
                        <option value="CPI A1">CPI A1</option>
                        <option value="CPI A2">CPI A2</option>
                        <option value="FISE A3">FISE A3</option>
                        <option value="FISE A4">FISE A4</option>
                        <option value="FISE A5">FISE A5</option>
                    </select>

                    <select id="spe" name="specialite" required>
                        <option value="">Sélectionner la spécialité enseignée*</option>
                        <option value="Généraliste">Généraliste</option>
                        <option value="Informatique">Informatique</option>
                        <option value="BTP">BTP</option>
                        <option value="Système Embarqué">Système Embarqué</option>
                    </select>

                    <span class="dates">Date de début d'enseignement :*</span>
                    <input type="date" id="debens" name="debutens" value="2024-04-05" min="2024-01-01" max="2034-12-31" required/>

                    <span id="champs">
                        * : Champs obligatoires
                    </span>

                    <div id="finir">
                        <button id="bouton" type="submit">
                            Ajouter un pilote
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <?php include "footer.php"; ?>
    </body>
</html>
