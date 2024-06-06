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

    
    $id_compte = $_POST['id_compte'];

    
    $conn->begin_transaction();

    try {
        
        $sql_acquerir = "DELETE FROM acquerir WHERE id_etudiant = (SELECT id_etudiant FROM etudiant WHERE id_compte = ?)";
        $stmt_acquerir = $conn->prepare($sql_acquerir);
        $stmt_acquerir->bind_param("i", $id_compte);
        $stmt_acquerir->execute();

        
        $sql_etudier = "DELETE FROM etudier WHERE id_etudiant = (SELECT id_etudiant FROM etudiant WHERE id_compte = ?)";
        $stmt_etudier = $conn->prepare($sql_etudier);
        $stmt_etudier->bind_param("i", $id_compte);
        $stmt_etudier->execute();

        
        $sql_etudiant = "DELETE FROM etudiant WHERE id_compte = ?";
        $stmt_etudiant = $conn->prepare($sql_etudiant);
        $stmt_etudiant->bind_param("i", $id_compte);
        $stmt_etudiant->execute();

       
        $sql_compte = "DELETE FROM compte WHERE id_compte = ?";
        $stmt_compte = $conn->prepare($sql_compte);
        $stmt_compte->bind_param("i", $id_compte);
        $stmt_compte->execute();

       
        $conn->commit();

        echo "Étudiant supprimé avec succès";
    } catch (Exception $e) {
        
        $conn->rollback();

        error_log("Erreur lors de la suppression de l'étudiant: " . $e->getMessage());
        echo "Erreur lors de la suppression de l'étudiant: " . $e->getMessage();
    }

    $conn->close();
}
?>
