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

    // Capturer les données du formulaire
    $id_compte = $_POST['id_compte'];

    // Démarrer une transaction
    $conn->begin_transaction();

    try {
        // Suppression des enregistrements dépendants dans la table acquerir
        $sql_acquerir = "DELETE FROM acquerir WHERE id_etudiant = (SELECT id_etudiant FROM etudiant WHERE id_compte = ?)";
        $stmt_acquerir = $conn->prepare($sql_acquerir);
        $stmt_acquerir->bind_param("i", $id_compte);
        $stmt_acquerir->execute();

        // Suppression des enregistrements dépendants dans la table etudier
        $sql_etudier = "DELETE FROM etudier WHERE id_etudiant = (SELECT id_etudiant FROM etudiant WHERE id_compte = ?)";
        $stmt_etudier = $conn->prepare($sql_etudier);
        $stmt_etudier->bind_param("i", $id_compte);
        $stmt_etudier->execute();

        // Suppression de l'étudiant
        $sql_etudiant = "DELETE FROM etudiant WHERE id_compte = ?";
        $stmt_etudiant = $conn->prepare($sql_etudiant);
        $stmt_etudiant->bind_param("i", $id_compte);
        $stmt_etudiant->execute();

        // Suppression du compte
        $sql_compte = "DELETE FROM compte WHERE id_compte = ?";
        $stmt_compte = $conn->prepare($sql_compte);
        $stmt_compte->bind_param("i", $id_compte);
        $stmt_compte->execute();

        // Valider la transaction
        $conn->commit();

        echo "Étudiant supprimé avec succès";
    } catch (Exception $e) {
        // En cas d'erreur, annuler la transaction
        $conn->rollback();

        error_log("Erreur lors de la suppression de l'étudiant: " . $e->getMessage());
        echo "Erreur lors de la suppression de l'étudiant: " . $e->getMessage();
    }

    $conn->close();
}
?>
