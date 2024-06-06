<?php
session_start();


if (!isset($_SESSION['id_compte'])) {

    header("Location: Connexion.php");
    exit;
}
?>