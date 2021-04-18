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
  require("_connect.php");
  $sql = "SELECT * FROM books WHERE userID = :userID";
  $stmt = dbo()->prepare($sql);
  $stmt->bindParam(':userID', $user['id'], PDO::PARAM_INT);
  $stmt->execute();
  $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
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
            <p class="lead">Here are your books!</p>
            <hr class="my-4">
          </div>
        </div>
      </header>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>Title</th>
          </tr>
        </thead>

        <tbody>
          <?php foreach($books as $book): ?>
            <tr>
              <td><?= $book['title'] ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>

      <a class="btn" href="logout.php">Logout</a>
      <a class="btn" href="newBook.php">New Book</a>
    </div>
  </body>
</html>