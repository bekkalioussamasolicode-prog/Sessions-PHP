<?php
if (file_exists("tasks.json")) {
  $json = file_get_contents("tasks.json");
  $tasks = json_decode($json, true);
} else {
  $tasks = [];
}
// get filter from url
$filter = $_GET['filter'] ?? 'all';
// by default show all tasks
$filteredTasks = $tasks;

if ($filter !== 'all') {
  // its like foreach (tasks as task) but with a condition and its returns a new array
  $filteredTasks = array_filter($tasks, function ($task) 
  use ($filter) {
    // here the condition we want so if its true keep it else remove it
    return $task['etat'] === $filter;
  });
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>To do list</title>
</head>
<body>
  <h1>List des taches</h1>
  <a href="Todolist.php">Toutes</a>
  <a href="Todolist.php?filter=a-faire">A faire</a>
  <a href="Todolist.php?filter=fait">Fait</a>
  <hr>
<?php

$list = "";
foreach($filteredTasks as $task) {
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
</body>
</html>
