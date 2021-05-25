<?php
  //Start session for every page that has this file linked
  session_start();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="header-section">
      <div class="pageButtons">
        <ul class="pButtons">
          <?php

            // If session variable "username" has been set (user has logged in) make the name element in the header the user's name else keep it as GameDevAnt
            if (isset($_SESSION["username"])) {
              echo "<li class='main-logo'><h2>" . $_SESSION['username'] . "</h2></li>";
            }
            else{
              echo "<li class='main-logo'><h2>GameDevAnt</h2></li>";
            }

          ?>
          <li class="link-buttons"><a href="index.php">Home</a></li>
          <li class="link-buttons"><a href="info.php">About</a></li>
          <?php

            // If session variable "useruid" has been set (user has logged in) show the Profile and Log out buttons in the header, else show the Sign Up and Log in buttons in the header
            if (isset($_SESSION["useruid"])) {
              echo "<li class='link-buttons'><a href='profile.php'>Profile</a></li>";
              echo "<li class='link-buttons'><a href='includes/logOut.inc.php'>Log Out</a></li>";
            }
            else {
              echo "<li class='link-buttons'><a href='signUp.php'>Sign Up</a></li>";
              echo "<li class='link-buttons'><a href='logIn.php'>Log In</a></li>";
            }

          ?>
        </ul>
      </div>
    </div>
  </body>
</html>
