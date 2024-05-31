<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Changer de mot de passe</title>
	<link rel="shortcut icon" href="Image/logo.png"/>
	<link rel="stylesheet" href="assets/style_changer_mdp.css">
</head>

<body>

	<header>

		<nav class="bandeau">
			<img src="Image/logo.png" id="logo">
		</nav>

	</header>

	<div id="change_mdp">

		<div id="conteneur_titre">

			<h2 id="titre">
				Changer de mot de passe
			</h2>

		</div>

		<div class="conteneur_label_input">

			<label>
				Entrez l'ancien mot de passe :
			</label>

			<input type="text" placeholder="Ancien mot de passe">

		</div>

		<div class="conteneur_label_input">

			<label>
				Entrez le nouveau mot de passe :
			</label>

			<input type="text" placeholder="Nouveau mot de passe">

		</div>

		<div class="conteneur_label_input">

			<label>
				Confirmer le nouveau mot de passe :
			</label>

			<input type="text" placeholder="Confirmer le nouveau mot de passe">

		</div>

		<div id="conteneur_bouton">

			<button id="btn">
				Changer le mot de passe
			</button>

		</div>

	</div>

	<?php include 'footer.php'; ?>

</body>

</html>