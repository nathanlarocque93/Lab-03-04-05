<?php

  session_start();

  if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
  }

  $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);

  if (empty($title)) {
    $_SESSION["errors"][] = "You must have a title";
    header("Location: newBook.php");
    exit();
  }

  require("_connect.php");
  $sql = "INSERT INTO books (
    title,
    userID
  ) VALUES (
    :title,
    {$_SESSION['user']['id']}
  )";

  $stmt = dbo()->prepare($sql);
  $stmt->bindParam(':title', $title, PDO::PARAM_STR);
  $stmt->execute();

  header("Location: books.php");
  exit();