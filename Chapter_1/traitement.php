<?php
/*
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nom = trim($_POST['nom']);
  $email = trim($_POST['email']);

  if (empty($nom) || empty($email)) {
    echo "Tous les champs sont oblig.";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Email invalide.";
  } else {
    echo "Bonjour $nom, Votre email est $email";
  }
}
*/
if ($_SERVER["REQUEST_METHOD"] === "GET") {
  $nom = trim($_GET['nom']);
  $email = trim($_GET['email']);

  if (empty($nom) || empty($email)) {
    echo "Tous les champs sont oblig.";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Email invalide.";
  } else {
    echo "Bonjour $nom, Votre email est $email";
  }
}