<?php
session_start();
// Redirect to login page if the 'utilisateur' session key is not set
if (!isset($_SESSION['utilisateur'])) {
    header('Location: login.php');
    exit;
}
echo "<h1>Bienvenue " . $_SESSION['utilisateur'] . " !</h1>";
echo "<a href='logout.php'>Se déconnecter</a>";
?>