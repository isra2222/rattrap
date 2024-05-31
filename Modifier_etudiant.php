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
                Modifier un étudiant
            </span>

            <div id="renseignement">

                <input type="text" id="uname" name="nom" placeholder="Nom" size="50"/>

                <input type="text" id="pnom" name="prenom" placeholder="Prénom" size="50"/>

                <div class="dates">

                <span class="dates">Date de naissance :</span>
                </div>

                <div class="calendar" >
                <input type="date" id="naiss" name="datenaissance" value="05-04-2024" min="01-01-2024" max="31-12-2034"/>
                </div>
                
                <input type="tel" id="tel" name="numerotelephone" pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}" required placeholder="Numéro de téléphone" size="50"/>
                
                <input type="email" id="email" name="email" pattern=".+@exemple\.com" size="50" placeholder="Adresse@mail" required/>

                <select id="etudiant" name="promotion">
                    <option value="">Sélectionner la promotion</option>
                    <option value="CPI A1">CPI A1</option>
                    <option value="CPI A2">CPI A2</option>
                    <option value="FISE A3">FISE A3</option>
                    <option value="FISE A4">FISE A4</option>
                    <option value="FISE A5">FISE A5</option>
                </select>

                <select id="spe" name="specialite">
                    <option value="">Sélectionner la spécialité</option>
                    <option value="Généraliste">Généraliste</option>
                    <option value="Informatique">Informatique</option>
                    <option value="BTP">BTP</option>
                    <option value="Système Embarqué">Système Embarqué</option>
                </select>

                <div class="dates">

                <span class="dates">Date de début de promotion :</span>

                </div>

                <div class="calendar">
                <input type="date" id="debens" name="debutens" value="05-04-2024" min="01-01-2024" max="31-12-2034"/>
                </div>

                <div class="dates">

                <span class="dates">Date de fin de promotion :</span>

                </div>

                <div class="calendar">
                <input type="date" id="debens" name="debutens" value="05-04-2024" min="01-01-2024" max="31-12-2034"/>
                </div>

            <div id="finir">
                <button id="bouton">
                    Modifier un étudiant
                </button>
            </div>


        </div>
        </div>
        <?php include "footer.php"; ?>
    </body>
