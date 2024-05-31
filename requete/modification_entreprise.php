<?php

require '../connexion_bdd/creation_connexion.php';


$nom = $_POST['nom'];
$adresse = $_POST['adresse'];
$code_postal = $_POST['code_postal'];
$ville = $_POST['ville'];
$secteur = $_POST['secteur'];
$siret = $_POST['id'];
$ancien_secteur = $_POST['ancien_s'];
$ancienne_ville = $_POST['ancien_v'];
$ancien_code_postal = $_POST['ancien_c'];

try {

    $requete_update_entreprise = $dbh->prepare("UPDATE Entreprise SET nom_entreprise = :nom WHERE numero_de_siret = :siret");
    $requete_update_entreprise->execute(array(':nom' => $nom, ':siret' => $siret));

    $requete = $dbh->prepare("DELETE FROM Posseder WHERE numero_de_siret = :siret");
    $requete->execute(array(':siret' => $siret));

    $requete = $dbh->prepare("SELECT id_secteur FROM Secteurs_activites WHERE nom_secteur = :secteur");
    $requete->execute(array(':secteur' => $secteur));
    $result = $requete->fetch(PDO::FETCH_ASSOC);

    $id_secteur = $result['id_secteur'];

    $requete = $dbh->prepare("INSERT INTO Posseder(id_secteur, numero_de_siret) VALUES (:id_secteur, :siret)");
    $requete->execute(array(':id_secteur' => $id_secteur, ':siret' => $siret));
    
    $requete = $dbh->prepare("UPDATE Adresse set nom_rue = :adresse WHERE numero_de_siret = :siret");
    $requete->execute(array(':adresse' => $adresse, ':siret' => $siret));

    $requete = $dbh->prepare("SELECT id_adresse FROM Adresse WHERE nom_rue = :adresse AND numero_de_siret = :siret");
    $requete->execute(array(':adresse' => $adresse, ':siret' => $siret));
    $result = $requete->fetch(PDO::FETCH_ASSOC);

    $id_adresse = $result['id_adresse'];

    $requete = $dbh->prepare("SELECT id_ville FROM Ville WHERE nom_ville = :ville AND code_postal = :code_postal");
    $requete->execute(array(':ville' => $ville, ':code_postal' => $code_postal));
    $result = $requete->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        $requete = $dbh->prepare("INSERT INTO Ville (nom_ville, code_postal) VALUES (:nom_ville, :code_postal)");
        $requete->bindParam(':nom_ville', $ville);
        $requete->bindParam(':code_postal', $code_postal);
        $requete->execute();
        $id_ville = $dbh->lastInsertId();
    } else {
        $id_ville = $result['id_ville'];
    }

    $requete = $dbh->prepare("SELECT id_ville FROM Ville WHERE nom_ville = :ancienne_ville AND code_postal = :ancien_code_postal");
    $requete->execute(array(':ancienne_ville' => $ancienne_ville, ':ancien_code_postal' => $ancien_code_postal));
    $result = $requete->fetch(PDO::FETCH_ASSOC);

    $requete = $dbh->prepare("UPDATE Appartenir set id_ville = :id_ville WHERE id_adresse = :id_adresse");
    $requete->execute(array(':id_adresse' => $id_adresse, ':id_ville' => $id_ville));

    header("Location: ../Rechercher_entreprise.php");

} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
}

?>