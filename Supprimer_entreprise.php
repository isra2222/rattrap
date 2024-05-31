<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de suppression</title>
    <link rel="stylesheet" href="assets/style_suppression.css">
</head>
<body>
	<header> <?php include "header.php"; ?> </header>

	<?php $idEntreprise = isset($_GET['id']) ? $_GET['id'] : ''; ?>

    <div class="container">

	    <div class="confirmation-container">
	        <p>Êtes-vous sûr de vouloir supprimer cette entreprise ?</p>
	        <form action="requete/Suppression_entreprise.php" method="POST">
	            <button type="submit" name="confirm" value="<?php echo $idEntreprise; ?>">Oui</button>
	            <a href="Rechercher_entreprise.php"><button type="button">Non</button></a>
	        </form>
	    </div>

    </div>

    <?php include "footer.php"; ?>
</body>
</html>
