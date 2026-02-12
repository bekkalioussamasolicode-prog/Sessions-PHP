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
    file_put_contents("tasks.json", json_encode($tasks));
    header("Location: Todolist.php");
    exit;
  }
}
?>
<form method='POST'>
    <input type='text' name='titre' placeholder='New task' required>
    <button type='submit' name='add'>Ajouter</button>
</form>