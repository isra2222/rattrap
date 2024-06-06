<?php include "requete/verif.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste étudiants</title>
    <link rel="stylesheet" href="assets/style_liste.css">
    <link rel="shortcut icon" href="Image/logo.png"/>
</head>
<body>
    <header>
        <?php include 'header.php'; ?>
    </header>

    <div class="search-container">
        <form id="searchForm" action="requete/recherche_etudiant.php" method="POST">
            <input type="text" id="nom" name="nom" placeholder="Nom" class="search-input">
            <input type="text" id="prenom" name="prenom" placeholder="Prénom" class="search-input">
            <div class="selection-container">
                <label for="classe" class="select-label">Sélectionnez une promotion :</label>
                <select id="classe" name="classe" class="select-input">
                    <option value="">Sélectionner une promotion</option>
                    <?php
                        require 'connexion_bdd/connexion_affichage.php';
                        $requete = "SELECT DISTINCT nom_promotion, specialite FROM promotion";
                        $result = $dbh->query($requete);
                        while ($colonne = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value=\"" . $colonne['nom_promotion'] . " " . $colonne['specialite'] . "\">" . $colonne['nom_promotion'] . " " . $colonne['specialite'] . "</option>";
                        }
                    ?>
                </select>
            </div>
            <button type="submit" class="search-button">Rechercher</button>
        </form>
    </div>

    <div id="result-container"></div>
    <div id="pagination" class="pagination"></div>

    <?php include 'footer.php'; ?>
</body>
</html>
