<?php

require 'connexion_bdd/creation_connexion.php';

$idEntreprise = isset($_GET['id']) ? $_GET['id'] : '';

try {

    $requete = $dbh->prepare("SELECT Entreprise.nom_entreprise, Adresse.nom_rue, Ville.code_postal, Ville.nom_ville, Secteurs_activites.nom_secteur FROM Entreprise JOIN Adresse ON Entreprise.numero_de_siret = Adresse.numero_de_siret JOIN Posseder ON Entreprise.numero_de_siret = Posseder.numero_de_siret JOIN Secteurs_activites ON Posseder.id_secteur = Secteurs_activites.id_secteur JOIN Appartenir ON Adresse.id_adresse = Appartenir.id_adresse JOIN Ville ON Ville.id_ville = Appartenir.id_ville WHERE Entreprise.numero_de_siret = :idEntreprise");
    $requete->bindParam(':idEntreprise', $idEntreprise);
    $requete->execute();

    $result = $requete->fetch(PDO::FETCH_ASSOC);

    $nom_entreprise = $result['nom_entreprise'];
    $nom_rue = $result['nom_rue'];
    $code_postal = $result['code_postal'];
    $nom_ville = $result['nom_ville'];
    $nom_secteur = $result['nom_secteur'];

} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
}

?>