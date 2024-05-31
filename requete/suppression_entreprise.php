<?php

require '../connexion_bdd/creation_connexion.php';

$id = $_POST['confirm'];

try {

    $requete = $dbh->prepare("UPDATE Entreprise set etat_entreprise = NOT etat_entreprise WHERE numero_de_siret = :siret");
    $requete->bindParam(':siret', $id);
    $requete->execute();

    header("Location: ../Rechercher_entreprise.php");

} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
}

?>