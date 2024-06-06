<?php
session_start();

require '../connexion_bdd/connexion_affichage.php';

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
    // Si le mot de passe est correct, définir un cookie pour stocker le nom d'utilisateur
    echo "Le mot de passe est correct. Définition du cookie...";

    $username_cookie_value = $nom_utilisateur; // Valeur du cookie est le nom d'utilisateur
    $username_cookie_name = "username"; // Nom du cookie
    $cookie_expiration = time() + 60; // Expiration dans 1 minute

    // Définir le cookie avec les options de sécurité
    if (setcookie($username_cookie_name, $username_cookie_value, $cookie_expiration, '/', 'tinkiet.fr', true, true)) {
        echo "Cookie défini avec succès.";
    } else {
        echo "Erreur lors de la définition du cookie.";
    }

    // Définir la session
    $_SESSION['id_compte'] = $id_compte;

    // Rediriger l'utilisateur vers la page d'accueil
    header("Location: ../Accueil.php");
    exit;
} else {
    // Si le mot de passe est incorrect, rediriger l'utilisateur vers la page de connexion
    echo "Mot de passe incorrect. Redirection vers la page de connexion...";
    header("Location: ../Connexion.php");
    exit;
}
?>
