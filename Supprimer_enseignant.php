<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width"/>
    <title>Supprimer un enseignant</title>
    <link rel="shortcut icon" href="Image/logo.png"/>
    <link rel="stylesheet" href="assets/style_ajouter_entreprise.css">
</head>
<body>
    <header>
        <?php include "header.php"; ?>
    </header>

    <div id="tableau">
        <span id="titre">
            Supprimer un enseignant
        </span>     

        <div id="renseignement">
            <form method="POST" action="requete/suppression_enseignant.php">
                <select id="enseignant" name="id_compte" required>
                    <option value="">Sélectionner l'enseignant*</option>
                    <?php
                    // Paramètres de connexion à la base de données
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "test";

                    // Créer une connexion
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Vérifier la connexion
                    if ($conn->connect_error) {
                        die("Connexion échouée: " . $conn->connect_error);
                    }

                    // Récupérer les enseignants
                    $sql = "SELECT id_compte, prenom, nom FROM enseignant";
                    $result = $conn->query($sql);

                    if ($result === false) {
                        die("Erreur de requête: " . $conn->error);
                    }

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['id_compte'] . "'>" . $row['prenom'] . " " . $row['nom'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>Aucun enseignant trouvé</option>";
                    }

                    $conn->close();
                    ?>
                </select>

                <span id="champs">
                    * : Champs obligatoires
                </span>

                <div id="finir">
                    <button id="bouton" type="submit">
                        Supprimer l'enseignant
                    </button>
                </div>
            </form>
        </div>
    </div>

    <?php include "footer.php"; ?>
</body>
</html>
