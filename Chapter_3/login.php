<?php
session_start();
// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Get the name and remove leading/trailing spaces
  $nom = trim($_POST['nom']);
  // If the name is not empty, store it in the session under the key 'utilisateur'
  if (!empty($nom)) {
    $_SESSION['utilisateur'] = $nom;
    // Redirect to profile page and stop script execution
    header('Location: profil.php');
    exit;

  }
  // show this if the $nom is empty
  else 
  {
    $message = "Veuillez entrer votre nom.";
  }
  
  if (!empty($message)) 
    echo "<p style='color:red;'>$message</p>";
}
?>
<form method="POST">
    <label>Nom :</label>
    <input type="text" name="nom">
    <button type="submit">Se connecter</button>
</form>