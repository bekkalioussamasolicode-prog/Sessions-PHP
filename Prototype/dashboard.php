<?php
session_start();
if (!isset($_SESSION["user"], $_SESSION["password"])) {
  header("Location: login.php");
  exit;
}
$users = [

  [   
    "name" => "Ahmed",

    "password" => "admin123",

    "role" => "administrateur",

    "active" => true
  ],

  [ 
    "name" => "Sara",

    "password" => "pass456",

    "role" => "formateur",

    "active" => true
  ],

  [   
    "name" => "Leila",

    "password" => "test789",

    "role" => "apprenant",

    "active" => false
  ],


  [
    "name" => "Alae",

    "password" => "test309",

    "role" => "apprenant",

    "active" => true
  ]
];
$name = $_SESSION["user"];
$password = $_SESSION["password"];
$found = false;
foreach($users as $user) {
  $username = strtolower($user["name"]);
  $psw = strtolower($user["password"]);
  if ($username === $name && $psw === $password) {
    $found = true;

    if ($user["active"]) {
      echo "<p style='color:green;'>Welcome {$user['name']}, Your role is {$user['role']}.</p>";
    } else {
      echo "<p style='color:red;'>Account is deactivated. Please contact support.</p>";
    }
    break;
  }
}
if (!$found) {
  echo "<p style='color:red;'>You're not on the list. Please contact support.</p>";
}
echo "<a href='logout.php'>Se deconnecter</a>";
?>