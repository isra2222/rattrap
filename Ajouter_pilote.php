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

                <input type="text" id="uname" name="nom" placeholder="Nom*" size="50"/>

                <input type="text" id="pnom" name="prenom" placeholder="Prénom*" size="50"/>

                <select id="pilote" name="promotion">
                    <option value="">Sélectionner la promotion*</option>
                    <option value="CPI A1">CPI A1</option>
                    <option value="CPI A2">CPI A2</option>
                    <option value="FISE A3">FISE A3</option>
                    <option value="FISE A4">FISE A4</option>
                    <option value="FISE A5">FISE A5</option>
                </select>

                <select id="spe" name="specialite">
                    <option value="">Sélectionner la spécialité enseignée*</option>
                    <option value="Généraliste">Généraliste</option>
                    <option value="Informatique">Informatique</option>
                    <option value="BTP">BTP</option>
                    <option value="Système Embarqué">Système Embarqué</option>
                </select>

                <span class="dates">Date de début d'enseignement :*</span>

                <input type="date" id="debens" name="debutens" value="05-04-2024" min="01-01-2024" max="31-12-2034"/>


            <span id="champs">
            * : Champs obligatoires
            </span>
            <div id="finir">
                <button id="bouton">
                    Ajouter un pilote
                </button>
            </div>


        </div>
        </div>
        <?php include "footer.php"; ?>
    </body>
</html>