<?php

//If the user has logged in and not just changed the url
if (isset($_POST["submit"])) {
  $username = $_POST["uid"];
  $pwd = $_POST["pwd"];

  //Require the databasehandler for the $conn variable
  require_once 'dbh.inc.php';
  //Require the functions.inc.php file for activating the loginUser function
  require_once 'functions.inc.php';

  //If login inputs are empty
  if (emptyInputLogin($username, $pwd) !== false) {
    //Take user back to the log in page with an error
    header("location: ../logIn.php?error=emptyinput");
    //And exit the script
    exit();
  }

  //Log in the user
  loginUser($conn, $username, $pwd);
}
//Otherwise
else{
  //Take the user back to the log in page
  header("location: ../logIn.php");
  //Exit the script
  exit();
}
