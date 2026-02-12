<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>To do list</title>
</head>
<body>
  <h1>List des taches</h1>
  <hr>
</body>
</html>
<?php
if (file_exists("tasks.json")) {
  $json = file_get_contents("tasks.json");
  $tasks = json_decode($json, true);
} else {
  $tasks = [];
}
$list = "";
foreach($tasks as $task) {
$list .= "<ul>
<li>Id: {$task['id']}</li>
<li>Titre: {$task['titre']}</li>
<li>Status: {$task['etat']}</li>
</ul>
<hr>
";
}
echo $list;
?>
<a href="add.php">Ajouter une tache</a>
