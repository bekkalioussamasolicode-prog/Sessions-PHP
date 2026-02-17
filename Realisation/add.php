<?php
if (file_exists("tasks.json")) {
  $json = file_get_contents("tasks.json");
  $tasks = json_decode($json, true);
} else {
  $tasks = [];
}
if (isset($_POST['add'])) {
  $titre = $_POST['titre'];

  if (!empty($titre)) {
    $ids = array_column($tasks, 'id');
    $newId = empty($ids) ? 1 : max($ids) + 1;

    $tasks[] = [
      "id" => $newId,
      "titre" => $titre,
      "etat" => "a-faire"
    ];
    file_put_contents("tasks.json", json_encode($tasks, JSON_PRETTY_PRINT));
    header("Location: Todolist.php");
    exit;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    form {
      display: flex;
      gap: 10px;
    }

    input[type="text"] {
      padding: 8px;
      width: 200px;
    }

    button {
      padding: 8px 16px;
    }
  </style>
</head>

<body>
  <form method='POST'>
    <input type='text' name='titre' placeholder='New task' required>
    <button type='submit' name='add'>Ajouter</button>
  </form>
</body>

</html>