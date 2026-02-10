<?php
session_start();
// if there's no user saved on the session
if (!isset($_SESSION["user"])) {
  header("Location: login.php");
  exit;
}
// get user from session
$user = $_SESSION["user"];
?>
<!-- we already have his name and role stored in the session so we only print them usin php echo shortcut -->
<p style="color:green;">
  Welcome <?= htmlspecialchars($user["name"]) ?>,  
  Your role is <?= htmlspecialchars($user["role"]) ?>.
</p>
<a href="logout.php">Se deconnecter</a>