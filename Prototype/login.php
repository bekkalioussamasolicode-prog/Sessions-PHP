<?php
session_start();
// get users list
include 'users.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = $_POST["name"] ?? "";
  $password = $_POST["psw"] ?? "";
  // loop only if the name and password aren't empty
  if (!empty($name) && !empty($password)) {
    foreach($users as $user) {

      if ($user["name"] === $name && $user["password"] === $password) {
        // if the user is on the list but not active
          if (!$user["active"]) {
            echo "<p style='color:red;'>Account is deactivated.</p>";
            exit;
        }
        // if the user is active store his name and role in the session
        $_SESSION["user"] = [
          "name" => $user["name"],
          "role" => $user["role"]
        ];
        header("Location: dashboard.php");
        exit;
      }
    }
  }
if (empty($name) || empty($password)) {
    echo "<p style='color:red;'>Please fill all fields.</p>";
} else {
    echo "<p style='color:red;'>Invalid credentials.</p>";
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