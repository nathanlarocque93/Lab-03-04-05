<?php
  // Before we render the form let's check for form values
  session_start();
  $form_values = $_SESSION['form_values'] ?? null;

  // Clear the form values
  unset($_SESSION['form_values']);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <title>Register</title>
  </head>

  <body>
    <?php include_once('notification.php') ?>
    
    <div class="container">
      <header class="jumbotron my-5">
        <h1 class="display-4">Registration</h1>
        <p class="lead">All the fun! All the glory!</p>
        <hr class="my-4">
        <p>
          Registration will provide you access to the literally the best site on the planet. Nay, the galaxy. NAY! <strong>THE UNIVERSE!</strong>
        </p>
      </header>

      <section class="mb-5">
        <form action="./insert.php" method="post" novalidate>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="first_name">First Name:</label>
                <input class="form-control" type="text" name="first_name" required placeholder="Herman" value="<?= $form_values['first_name'] ?? null ?>">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input class="form-control" type="text" name="last_name" required placeholder="Munster" value="<?= $form_values['last_name'] ?? null ?>">
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="email">Email:</label>
                <input class="form-control" type="email" name="email" placeholder="herman.munster@mockingbird.com" required value="<?= $form_values['email'] ?? null ?>">
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <label for="email_confirmation">Email Confirmation:</label>
                <input class="form-control" type="email" name="email_confirmation" placeholder="herman.munster@mockingbird.com" required value="<?= $form_values['email_confirmation'] ?? null ?>">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="password">Password:</label>
                <input class="form-control" type="password" name="password" required>
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <label for="password_confirmation">Password Confirmation:</label>
                <input class="form-control" type="password" name="password_confirmation" required>
              </div>
            </div>
          </div>

          <!-- Add the recaptcha field -->

          <button class="btn" type="submit">Register</button>
          <a class="btn" href="login.php">Login</a>
        </form>
      </section>
    </div>

    <!-- Add the recaptcha scripts -->

  </body>
</html>