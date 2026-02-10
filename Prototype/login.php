<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = "";
  $password = "";
  if (isset($_POST["name"])){
  $name = strtolower($_POST["name"]);
  }
  if (isset($_POST["psw"])){
  $password = strtolower($_POST["psw"]);
  }
  if (!empty($name) && !empty($password)) {
    $_SESSION["user"] = $name;
    $_SESSION["password"] = $password;
    header('Location: dashboard.php');
    exit;
  } else {
    $message1 = "";
    $message2 = "";
    if (empty($name)) {
      $message1 = "Please fill your name";
    } 
    if (empty($password)) {
      $message2 = "Please fill your password";
    }
    echo "<p style='color:red;'>$message1</p>";
    echo "<p style='color:red;'>$message2</p>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
</head>
<body>
  <form method="POST">
    <label>Name :</label>
    <input type="text" name="name">
    <label>Password :</label>
    <input type="password" name="psw">
    <button type="submit">Login</button>
  </form>
</body>
</html>