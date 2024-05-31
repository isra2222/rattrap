<?php

require '../connexion_bdd/creation_connexion.php';

// Récupération des données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$promotion = $_POST['promotion'];
$debut = $_POST['debutens'];
$fin = $_POST['finens'];
$comp = $_POST['comp'];

try {

    $sql = "INSERT INTO Etudiant (nom, prenom) VALUES (:nom, :prenom)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->execute();

    $nouveau_id_etudiant = $dbh->lastInsertId();

    $sql = "SELECT id_promotion FROM Promotion WHERE nom_promotion = :promotion";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':promotion', $promotion);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $id_promotion = $result['id_promotion'];

    $sql = "INSERT INTO Etudier (id_etudiant, id_promotion, date_debut, date_fin) VALUES (:id_etudiant, :id_promotion, :debut, :fin)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id_etudiant', $nouveau_id_etudiant);
    $stmt->bindParam(':id_promotion', $id_promotion);
    $stmt->bindParam(':debut', $debut);
    $stmt->bindParam(':fin', $fin);
    $stmt->execute();

    $comptence = explode(',', $comp);

    foreach ($comptence as $c) {
        $sql = "INSERT INTO Competences(nom_competence) VALUES(:competence)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':competence', $c);
        $stmt->execute();

        // Insertion de la relation Acquerir
        $sql = "INSERT INTO Acquerir (id_etudiant, id_competence) VALUES (:id_etudiant, LAST_INSERT_ID())";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':id_etudiant', $nouveau_id_etudiant);
        $stmt->execute();
    }

    header("Location: ../Ajouter_etudiant.php");

} catch (PDOException $e) {
    // En cas d'erreur, annulation de la transaction
    $dbh->rollBack();
    echo "Erreur lors de l'ajout de l'étudiant : " . $e->getMessage();
}
?>
