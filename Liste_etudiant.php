<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Liste étudiants</title>
	<link rel="stylesheet" href="assets/style_liste.css">
	<link rel="shortcut icon" href="Image/logo.png"/>
	<script src="script/liste_etudiant.js"></script>
</head>
<body>
	<header>

	    <?php include 'header.php'; ?>
	    
	</header>

  	<div class="search-container">
	    <input type="text" id="nom" placeholder="Nom" class="search-input">
	    <input type="text" id="prenom" placeholder="Prénom" class="search-input">
	    <div class="selection-container">
	        <label for="classe" class="select-label">Sélectionnez une promotion :</label>
	        <select id="classe" class="select-input">
	        <?php
                require 'connexion_bdd/creation_connexion.php';

                $requete = "SELECT DISTINCT nom_promotion, specialite FROM promotion";
                $result = $dbh->query($requete);

                while ($colonne = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option>" . $colonne['nom_promotion'] . " " . $colonne['specialite'] ."</option>";
                }
            ?>
	        </select>
	    </div>
	    <button onclick="rechercher()" class="search-button">Rechercher</button>
	</div>

	
    <?php
        require 'connexion_bdd/creation_connexion.php';

        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $studentsPerPage = 3; // Nombre d'étudiants par page

        $sql = "SELECT Etudiant.nom, Etudiant.prenom, Compte.email_pro, Promotion.nom_promotion, Promotion.specialite, Centre.nom_centre, GROUP_CONCAT(Competences.nom_competence SEPARATOR ', ') AS competences_acquises FROM Etudiant JOIN Compte ON Etudiant.id_compte = Compte.id_compte LEFT JOIN Etudier ON Etudiant.id_etudiant = Etudier.id_etudiant LEFT JOIN Promotion ON Etudier.id_promotion = Promotion.id_promotion LEFT JOIN Centre ON Promotion.id_centre = Centre.id_centre LEFT JOIN Acquerir ON Etudiant.id_etudiant = Acquerir.id_etudiant LEFT JOIN Competences ON Acquerir.id_competence = Competences.id_competence GROUP BY Etudiant.nom, Etudiant.prenom, Compte.email_pro, Promotion.nom_promotion, Promotion.specialite, Centre.nom_centre";
        $result = $dbh->query($sql);
        $totalStudents = $result->rowCount();
        $totalPages = ceil($totalStudents / $studentsPerPage);

        $offset = ($page - 1) * $studentsPerPage;

        $sql .= " LIMIT $offset, $studentsPerPage";
        $result = $dbh->query($sql);

        $index = 0;

        while ($colonne = $result->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="container">';
            echo '<div class="profile">';
            echo '<img src="Image/profil.png" alt="Profile Picture">';
            echo '<div class="info">';
            echo '<h2>' . $colonne['nom'] . ' ' . $colonne['prenom'] . '</h2>';
            echo '<p>' . $colonne['email_pro'] .'</p>';
            echo '</div></div>';
            echo '<div class="points-container" onclick="toggleDropdown(' . $index . ')">';
            echo '<div class="point"></div>';
            echo '<div class="point"></div>';
            echo '<div class="point"></div>';
            echo '</div>';
            echo '<div class="dropdown-menu" id="dropdownMenu_' . $index . '">';
            echo '<a href="#">Profil</a>';
            echo '<a href="#">Modifier</a>';
            echo '<a href="#">Supprimer</a>';
            echo '</div></div>';

            $index++;
        }
    ?>

	<div id="pagination" class="pagination"></div>

	<?php include 'footer.php'; ?>

</body>

<script type="text/javascript">
	// Fonction pour afficher les boutons de pagination
    function showPagination() {
        var totalPages = <?php echo $totalPages; ?>;
        var currentPage = <?php echo $page; ?>;
        var paginationContainer = document.getElementById('pagination');

        paginationContainer.innerHTML = '';

        for (var i = 1; i <= totalPages; i++) {
            var button = document.createElement('button');
            button.innerText = i;
            button.value = i;
            if (i === currentPage) {
                button.classList.add('active');
            }
            button.addEventListener('click', function () {
                showStudents(this.value);
            });
            paginationContainer.appendChild(button);
        }
    }
showPagination();
</script>

</html>