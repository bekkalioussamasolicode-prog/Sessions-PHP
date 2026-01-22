<?php
if (isset($_COOKIE['utilisateur'])) {
  echo "bonjour " . $_COOKIE['utilisateur'];
} else {
  echo "Get Out";
}