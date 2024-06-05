<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

    // Capturer l'ID de compte depuis le formulaire
    $id_compte = $_POST['id_compte'];

    // Démarrer une transaction
    $conn->begin_transaction();

    try {
        // Suppression des compétences acquises par l'enseignant
        $sql_piloter = "DELETE FROM piloter WHERE id_enseignant = (SELECT id_enseignant FROM enseignant WHERE id_compte = ?)";
        $stmt_piloter = $conn->prepare($sql_piloter);
        $stmt_piloter->bind_param("i", $id_compte);
        $stmt_piloter->execute();

        // Suppression de l'enseignant
        $sql_enseignant = "DELETE FROM enseignant WHERE id_compte = ?";
        $stmt_enseignant = $conn->prepare($sql_enseignant);
        $stmt_enseignant->bind_param("i", $id_compte);
        $stmt_enseignant->execute();

        // Suppression du compte
        $sql_compte = "DELETE FROM compte WHERE id_compte = ?";
        $stmt_compte = $conn->prepare($sql_compte);
        $stmt_compte->bind_param("i", $id_compte);
        $stmt_compte->execute();

        // Valider la transaction
        $conn->commit();

        echo "Enseignant et les enregistrements associés ont été supprimés avec succès";
    } catch (Exception $e) {
        // En cas d'erreur, annuler la transaction
        $conn->rollback();

        echo "Erreur lors de la suppression: " . $e->getMessage();
    }

    $conn->close();
}
?>
