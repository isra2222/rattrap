<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    
    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("Connexion échouée: " . $conn->connect_error);
    }

 
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $promotion = $_POST['promotion'];
    $specialite = $_POST['specialite'];
    $debutens = $_POST['debutens'];

    
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    
    $sql_compte = "INSERT INTO compte (email_pro, mot_de_passe) VALUES ('$email', '$hashed_password')";
    if ($conn->query($sql_compte) === TRUE) {
        $id_compte = $conn->insert_id; 


        $sql_enseignant = "INSERT INTO enseignant (prenom, nom, id_compte) VALUES ('$prenom', '$nom', '$id_compte')";
        if ($conn->query($sql_enseignant) === TRUE) {
            $id_enseignant = $conn->insert_id; 


            $promotion_ids = [
                "CPI A1" => 1,
                "CPI A2" => 2,
                "FISE A3" => 3,
                "FISE A4" => 4,
                "FISE A5" => 5,
            ];

            $id_promotion = $promotion_ids[$promotion];

            $sql_piloter = "INSERT INTO piloter (id_enseignant, id_promotion, date_debut_ens, date_fin_ens) VALUES ('$id_enseignant', '$id_promotion', '$debutens', DATE_ADD('$debutens', INTERVAL 1 YEAR))";
            if ($conn->query($sql_piloter) === TRUE) {
                echo "Nouveau pilote ajouté avec succès";
            } else {
                echo "Erreur: " . $sql_piloter . "<br>" . $conn->error;
            }
        } else {
            echo "Erreur: " . $sql_enseignant . "<br>" . $conn->error;
        }
    } else {
        echo "Erreur: " . $sql_compte . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
