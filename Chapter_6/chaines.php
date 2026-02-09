<?php
$phrase = "Hello PHP";
// strlen to calc the length of a string
echo "Longueur : " . strlen($phrase) . "<br>";
echo "Majuscules : " . strtoupper($phrase) . "<br>";
echo "Minuscules : " . strtolower($phrase) . "<br>";

echo "Position de PHP : " . strpos($phrase, "PHP") . "<br>";
$nouvellePhrase = str_replace("Hello", "is this", $phrase);
echo "Remplacé : " . $nouvellePhrase . "<br>";

$liste = "HTML,CSS,JavaScript,PHP";
// explode () turn string to an array
$techs = explode(",", $liste);
// turn an array to string
echo "Technologies : " . implode(" | ", $techs);

$texte = "     bonjour    ";
echo "<br> Texte nettoyé : '" . trim($texte) . "'";