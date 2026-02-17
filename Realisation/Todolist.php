<?php
if (file_exists("tasks.json")) {
  $json = file_get_contents("tasks.json");
  $tasks = json_decode($json, true);
} else {
  $tasks = [];
}
// delete a task
$delete = $_GET['delete'] ?? "";
if (!empty($delete)) {
  $tasks = array_filter($tasks, function ($task) use ($delete) {
    return $task['id'] != $delete;
  });

  file_put_contents("tasks.json", json_encode($tasks, JSON_PRETTY_PRINT));

  header("Location: Todolist.php");
  exit;
}
// change task statut
$change = $_GET['change'] ?? "";

if (!empty($change)) {
  foreach ($tasks as &$task) {
    if ($task['id'] == $change) {

      if ($task['etat'] == "a-faire") {
        $task['etat'] = "fait";
      } else {
        $task['etat'] = "a-faire";
      }
      break;
    }
  }
  unset($task);
  file_put_contents("tasks.json", json_encode($tasks, JSON_PRETTY_PRINT));
  header("Location: Todolist.php");
  exit;
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
  <style>
    .t {
      border-collapse: collapse;
      width: 100%;
    }

    .t th,
    .t td {
      border: 1px solid black;
      padding: 8px;
      text-align: left;
    }

    .t th {
      background-color: #f2f2f2;
    }

    a {
      text-decoration: none;
      color: blue;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <h1>List des taches</h1>
  <a href="Todolist.php">Toutes |</a>
  <a href="Todolist.php?filter=a-faire">A faire |</a>
  <a href="Todolist.php?filter=fait">Fait</a>
  <hr>
  <?php

  $list = "
  <table border='1' class='t'>
  <tr>
  <th>Id</th>
  <th>Titre</th>
  <th>Status</th>
  <th>Change</th>
  <th>Delete</th>
  </tr>";
  foreach ($filteredTasks as $task) {
    $list .= "
    <tr>
    <td>{$task['id']}</td>
    <td>{$task['titre']}</td>
    <td>{$task['etat']}</td>
    <td><a href='Todolist.php?change={$task['id']}'>changer</a></td>
    <td><a href='Todolist.php?delete={$task['id']}'>supprimer</a></td>
    </tr>
  ";
  }
  $list .= "</table>";
  echo $list;
  ?>
  <hr>
  <a href="add.php">Ajouter une tache</a>
</body>

</html>