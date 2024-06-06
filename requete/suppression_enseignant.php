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

    // Capture l'ID de compte dans formulaire
    $id_compte = $_POST['id_compte'];

    
    $conn->begin_transaction();

    try {
        
        $sql_piloter = "DELETE FROM piloter WHERE id_enseignant = (SELECT id_enseignant FROM enseignant WHERE id_compte = ?)";
        $stmt_piloter = $conn->prepare($sql_piloter);
        $stmt_piloter->bind_param("i", $id_compte);
        $stmt_piloter->execute();

       
        $sql_enseignant = "DELETE FROM enseignant WHERE id_compte = ?";
        $stmt_enseignant = $conn->prepare($sql_enseignant);
        $stmt_enseignant->bind_param("i", $id_compte);
        $stmt_enseignant->execute();

     
        $sql_compte = "DELETE FROM compte WHERE id_compte = ?";
        $stmt_compte = $conn->prepare($sql_compte);
        $stmt_compte->bind_param("i", $id_compte);
        $stmt_compte->execute();


        $conn->commit();

        echo "Enseignant supprimé avec succès";
    } catch (Exception $e) {
        
        $conn->rollback();

        echo "Erreur lors de la suppression: " . $e->getMessage();
    }

    $conn->close();
}
?>
