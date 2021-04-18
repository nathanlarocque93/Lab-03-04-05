<?php
 
  // Connect to the database
  require("_connect.php");
  $conn = dbo();
 
  // Create our SQL with an email placeholder
  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
  $email = strtolower($email);
  $password = filter_input(INPUT_POST, 'password');
 
  // Prepare the SQL
  $sql = "SELECT * FROM users WHERE email = :email";
  $stmt = $conn->prepare($sql);
 
  // Bind the value to the placeholder
  $stmt->bindParam(':email', $email, PDO::PARAM_STR);
 
  // Execute
  $stmt->execute();
 
  // Get user
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
 
  // Check if we have a user and their password is correct
  $authorized = false;
  if ($user) {
    $authorized = password_verify($password, $user['password']);
  }
 
  session_start();
  if (!$authorized) {
    $_SESSION['errors'][] = "Your login/password combination could not be found.";
    $_SESSION['form_values'] = $_POST;
 
    header("Location: login.php");
    exit();
  }
 
  unset($user['password']);
  $_SESSION['user'] = $user;
  $_SESSION['successes'][] = "You have been successfully logged in.";
  header("Location: profile.php");
  exit();