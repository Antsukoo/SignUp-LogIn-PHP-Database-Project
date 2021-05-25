<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Log In Page</title>
    <link rel="stylesheet" href="css/signUp.css">
  </head>
  <body>

    <!--
      Gets the header from the header.php file
    -->
    <?php
      require_once 'header.php';
     ?>

    <main>
    <div class="main-div">

      <!--
        The title for the log in page
      -->
      <h1 class="main-text">Log In</h1>

      <!--
        The log in inputs
      -->
      <form class="input-form" action="includes/logIn.inc.php" method="post">
        <input class="text-input" type="text" name="uid" value="" placeholder="Username or Email"><br>
        <input class="text-input" type="password" name="pwd" value="" placeholder="Password"><br>
        <input class="button-input" type="submit" name="submit" value="Log In">
      </form>
      <?php

        //The error messages for the log in page
    
        if (isset($_GET["error"])) {
          if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill all the fields!</p>";
          }
          else if ($_GET["error"] == "wronglogin"){
            echo "<p>Invalid login information!</p>";
          }
        }
      ?>
    </div>

    </main>

    <!--
      Gets the footer from the footer.php file
    -->
    <?php
      require_once 'footer.php';
     ?>


  </body>
</html>
