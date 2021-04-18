<?php

  session_start();

  // Logging out means just destroying the session variable 'user'
  unset($_SESSION['user']);

  // Then redirect with a success message
  $_SESSION['successes'][] = "You have been successfully logged out.";
  header("Location: index.php");
  exit();