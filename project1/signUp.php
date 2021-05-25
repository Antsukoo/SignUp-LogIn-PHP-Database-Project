<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="css/signUp.css">
  </head>
  <body>

    <!--
      Gets the header from the header.php file
    -->
    <?php
      require_once 'header.php';
     ?>

    <!--
      The form inputs for the sign up form
    -->
    <main>
    <div class="main-div">
      <h1 class="main-text">Sign Up</h1>
      <form class="input-form" action="includes/signUp.inc.php" method="post">
        <input class="text-input" type="text" name="name" value="" placeholder="Enter your full name"><br>
        <input class="text-input" type="text" name="uid" value="" placeholder="Enter your username"><br>
        <input class="text-input" type="text" name="email" value="" placeholder="Enter your email"><br>
        <input class="text-input" type="text" name="pwd" value="" placeholder="Enter your password"><br>
        <input class="text-input" type="text" name="repeatPwd" value="" placeholder="Repeat your password"><br>
        <input class="button-input" type="submit" name="submit" value="Sign Up">
      </form>

      <!--
        Error messages for wrong login
      -->
      <?php
        if (isset($_GET["error"])) {
          if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill all the fields!</p>";
          }
          else if ($_GET["error"] == "invaliduid"){
            echo "<p>Choose a proper username!</p>";
          }
          else if ($_GET["error"] == "invalidemail"){
            echo "<p>Choose a proper email!</p>";
          }
          else if ($_GET["error"] == "passwordsdontmatch"){
            echo "<p>Passwords don't match!</p>";
          }
          else if ($_GET["error"] == "stmtfailed"){
            echo "<p>Something went wrong, try again!</p>";
          }
          else if ($_GET["error"] == "usernametaken"){
            echo "<p>Username already taken!</p>";
          }
          else if ($_GET["error"] == "none"){
            echo "<p>Sign up successfull!</p>";
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
