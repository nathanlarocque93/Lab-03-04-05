<?php

  // If they're not logged in, redirect them
  if (session_status() === PHP_SESSION_NONE) session_start();
  if (!isset($_SESSION['user'])) {
    $_SESSION["errors"][] = "You're not logged in.";
    header("Location: login.php");
    exit();
  }

  // Assign the user
  $user = $_SESSION['user'];
  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <title>Profile</title>
  </head>

  <body>
    <?php include_once('notification.php') ?>

    <div class="container">
      <header class="jumbotron my-5">
          <div class="col-7">
            <h1 class="display-4">Hello <strong><?= "{$user['first_name']} {$user['last_name']}" ?></strong></h1>
            <p class="lead">Create a New Book</p>
            <hr class="my-4">
          </div>
        </div>
      </header>

      <form action="insertBook.php" method="post">
        <div class="form-group">
          <label>Title:</label>
          <input type="text" name="title" class="form-control">
        </div>
        
        <button class="btn btn-primary">Create</button>
      </form>

      <a class="btn" href="logout.php">Logout</a>
    </div>
  </body>
</html>