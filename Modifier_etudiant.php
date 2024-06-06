<?php include "requete/verif.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Modifier un étudiant</title>
</head>
<body>
    <h2>Modifier un étudiant</h2>
    <form method="post" action="modifier_etudiant.php">
        <label for="id_compte">Sélectionnez un étudiant :</label>
        <select name="id_compte">
            <!-- Options rajoutées dynamiquement PHP -->
        </select>
        <br><br>
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" required>
        <br><br>
        <label for="nom">Nom :</label>
        <input type="text" name="nom" required>
        <br><br>
        <label for="email_pro">Email professionnel :</label>
        <input type="email" name="email_pro" required>
        <br><br>
        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" name="mot_de_passe" required>
        <br><br>
        <input type="submit" value="Modifier">
    </form>
</body>
</html>
