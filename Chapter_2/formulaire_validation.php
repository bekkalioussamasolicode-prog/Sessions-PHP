<?php
// error arr
$erreurs = [];
// pre-declare to avoid undifined
$nom = $email = '';
// Is there a post request ?
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // get the nom input 
  $nom = trim($_POST['nom']);
  // get the email input
  $email = trim($_POST['email']);
  // if the nom is empty
  if (empty($nom)) {
    $erreurs[] = "Le nom est obligatoire.";
  }
  // if the email is empty
  if (empty($email)) {
    $erreurs[] = "L'email est obligatoire.";
    //if the email input isn't valide
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erreurs[] = "L'email n'est pas valide.";
  }
  // if no errors 
  if (empty($erreurs)) {
    echo "<p style='color:green;'>Formulaire envoye avec succes !</p>";
  } else {
    echo "<ul style='color:red;'>";
    foreach ($erreurs as $err) {
      echo "<li>$err</li>";
    }
    echo "</ul>";
  }
}
?>
<form method="post">
  <label>Nom :</label>
  <!-- prevent html injection  -->
  <!-- if u use html tags like <h1></h1> convert it to h1 h1 -->
  <!-- and echo $nom from php to nom input -->
  <input type="text" name="nom" value="<?= htmlspecialchars($nom) ?>">
  <label>Email :</label>
  <input type="text" name="email" value="<?= htmlspecialchars($email) ?>">

  <button type="submit">Envoyer</button>
</form>