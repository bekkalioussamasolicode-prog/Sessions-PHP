<?php 
// if we use require and header.php failed to load it's stops here and pops a fatal error
// require 'header.php';
include 'header.php';
?>
<main>
  <h2>Page d'accueil</h2>
  <p>Contenu de la page principale.</p>
</main>
<?php
// on the other side include shows a warning and continue execution
include 'footer.php';
?>