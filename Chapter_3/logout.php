<?php
session_start();
// Remove all session variables
session_unset();
// Destroy the session
session_destroy();
// redirect to login page
header('Location: login.php');
exit;
