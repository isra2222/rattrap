<?php
session_start();

require '../connexion_bdd/creation_connexion.php';

$nom_utilisateur = $_POST['nom_utilisateur'];
$mdp = $_POST['mot_de_passe'];

$requete = $dbh->prepare("SELECT mot_de_passe, id_compte FROM Compte WHERE email_pro = :nom_utilisateur");

if (!$requete->execute(array(':nom_utilisateur' => $nom_utilisateur))) {
    echo "Erreur lors de l'exécution de la requête SQL : " . $requete->errorInfo()[2];
    exit;
}

$resultat = $requete->fetch(PDO::FETCH_ASSOC);
if (!$resultat) {
    echo "Aucun utilisateur trouvé avec ce pseudo.";
    exit;
}

$motDePasseHache = $resultat['mot_de_passe'];
$id_compte = $resultat['id_compte'];

if (password_verify($mdp, $motDePasseHache)) {
    $_SESSION['id_compte'] = $id_compte;

    header("Location: ../Accueil.php");
    exit;
} else {
    header("Location: ../Connexion.php");
    exit;
}

?>