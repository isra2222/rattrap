<?php

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT id_compte, prenom, nom FROM etudiant";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
        echo "<option value='" . $row["id_compte"] . "'>" . $row["prenom"] . " " . $row["nom"] . "</option>";
    }
} else {
    echo "Aucun étudiant trouvé dans la base de données.";
}


$conn->close();
?>
