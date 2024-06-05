<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../connexion_bdd/connexion_affichage.php';

$nom = isset($_POST['nom']) ? $_POST['nom'] : '';
$prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
$promotion = isset($_POST['classe']) ? $_POST['classe'] : '';
$page = isset($_POST['page']) ? (int)$_POST['page'] : 1;

$studentsPerPage = 3;
$offset = ($page - 1) * $studentsPerPage;

$sql = "SELECT Etudiant.nom, Etudiant.prenom, Compte.email_pro, Promotion.nom_promotion, Promotion.specialite, Centre.nom_centre, GROUP_CONCAT(Competences.nom_competence SEPARATOR ', ') AS competences_acquises
        FROM Etudiant
        JOIN Compte ON Etudiant.id_compte = Compte.id_compte
        LEFT JOIN Etudier ON Etudiant.id_etudiant = Etudier.id_etudiant
        LEFT JOIN Promotion ON Etudier.id_promotion = Promotion.id_promotion
        LEFT JOIN Centre ON Promotion.id_centre = Centre.id_centre
        LEFT JOIN Acquerir ON Etudiant.id_etudiant = Acquerir.id_etudiant
        LEFT JOIN Competences ON Acquerir.id_competence = Competences.id_competence
        WHERE 1=1";

if (!empty($nom)) {
    $sql .= " AND Etudiant.nom LIKE :nom";
}
if (!empty($prenom)) {
    $sql .= " AND Etudiant.prenom LIKE :prenom";
}
if (!empty($promotion)) {
    $sql .= " AND CONCAT(Promotion.nom_promotion, ' ', Promotion.specialite) LIKE :promotion";
}

$sql .= " GROUP BY Etudiant.nom, Etudiant.prenom, Compte.email_pro, Promotion.nom_promotion, Promotion.specialite, Centre.nom_centre";
$totalResult = $dbh->prepare($sql);

if (!empty($nom)) {
    $totalResult->bindValue(':nom', '%' . $nom . '%');
}
if (!empty($prenom)) {
    $totalResult->bindValue(':prenom', '%' . $prenom . '%');
}
if (!empty($promotion)) {
    $totalResult->bindValue(':promotion', '%' . $promotion . '%');
}

$totalResult->execute();
$totalStudents = $totalResult->rowCount();
$totalPages = ceil($totalStudents / $studentsPerPage);

$sql .= " LIMIT :offset, :studentsPerPage";
$stmt = $dbh->prepare($sql);

if (!empty($nom)) {
    $stmt->bindValue(':nom', '%' . $nom . '%');
}
if (!empty($prenom)) {
    $stmt->bindValue(':prenom', '%' . $prenom . '%');
}
if (!empty($promotion)) {
    $stmt->bindValue(':promotion', '%' . $promotion . '%');
}
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->bindValue(':studentsPerPage', $studentsPerPage, PDO::PARAM_INT);

$stmt->execute();

echo '<input type="hidden" id="totalPages" value="' . $totalPages . '">';

$index = 0;
while ($colonne = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo '<div class="container">';
    echo '<div class="profile">';
    echo '<img src="../Image/profil.png" alt="Profile Picture">';
    echo '<div class="info">';
    echo '<h2>' . $colonne['nom'] . ' ' . $colonne['prenom'] . '</h2>';
    echo '<p>' . $colonne['email_pro'] . '</p>';
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

<script>
function toggleDropdown(index) {
    var dropdown = document.getElementById('dropdownMenu_' + index);
    dropdown.classList.toggle('show');
}
</script>
