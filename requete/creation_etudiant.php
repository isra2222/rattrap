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
    $mot_de_passe = $_POST['mot_de_passe']; 
    $promotion = $_POST['promotion'];
    $debutens = $_POST['debutens'];
    $finens = $_POST['finens'];
    $competence = $_POST['competence'];

    
    $conn->begin_transaction();

    try {
        
        $hashed_password = password_hash($mot_de_passe, PASSWORD_DEFAULT);
        $sql_compte = "INSERT INTO compte (email_pro, mot_de_passe) VALUES (?, ?)";
        $stmt_compte = $conn->prepare($sql_compte);
        $stmt_compte->bind_param("ss", $email, $hashed_password);
        $stmt_compte->execute();
        $id_compte = $stmt_compte->insert_id;

        
        $sql_etudiant = "INSERT INTO etudiant (prenom, nom, id_compte) VALUES (?, ?, ?)";
        $stmt_etudiant = $conn->prepare($sql_etudiant);
        $stmt_etudiant->bind_param("ssi", $prenom, $nom, $id_compte);
        $stmt_etudiant->execute();
        $id_etudiant = $stmt_etudiant->insert_id;

    
        $sql_etudier = "INSERT INTO etudier (id_etudiant, id_promotion, date_debut, date_fin) VALUES (?, ?, ?, ?)";
        $stmt_etudier = $conn->prepare($sql_etudier);
        $stmt_etudier->bind_param("iiss", $id_etudiant, $promotion, $debutens, $finens);
        $stmt_etudier->execute();

   
        $sql_competences = "INSERT INTO competences (nom_competence) VALUES (?) ON DUPLICATE KEY UPDATE id_competence=LAST_INSERT_ID(id_competence)";
        $stmt_competences = $conn->prepare($sql_competences);
        $stmt_competences->bind_param("s", $competence);
        $stmt_competences->execute();
        $id_competence = $stmt_competences->insert_id;

      
        $sql_acquerir = "INSERT INTO acquerir (id_etudiant, id_competence) VALUES (?, ?)";
        $stmt_acquerir = $conn->prepare($sql_acquerir);
        $stmt_acquerir->bind_param("ii", $id_etudiant, $id_competence);
        $stmt_acquerir->execute();

      
        $conn->commit();

        echo "Étudiant ajouté avec succès";
    } catch (Exception $e) {
    
        $conn->rollback();

        error_log("Erreur lors de l'ajout de l'étudiant: " . $e->getMessage());
        echo "Erreur lors de l'ajout de l'étudiant: " . $e->getMessage();
    }

    $conn->close();
}
?>
