<?php

// If the user has signed up correctly and not just changed the url, else send the user back to the sign up page
if (isset($_POST["submit"])){

  //User sign up information
  $name = $_POST['name'];
  $email = $_POST['email'];
  $username = $_POST['uid'];
  $pwd = $_POST['pwd'];
  $pwdRepeat = $_POST['repeatPwd'];

  // Link the dbh.inc.php and functions.inc.php files
  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  // Error for not filled sign up inputs
  if (emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false) {
    // Send user back to the sign up page with error "emptyinput"
    header("location: ../signUp.php?error=emptyinput");
    exit();
  }

  // Error for an invalid username
  if (invalidUid($username) !== false) {
    // Send user back to the sign up page with error "invaliduid"
    header("location: ../signUp.php?error=invaliduid");
    exit();
  }

  // Error for an invalid email
  if (invalidEmail($email) !== false) {
    // Send user back to the sign up page with error "invalidemail"
    header("location: ../signUp.php?error=invalidemail");
    exit();
  }

  // Error for not matching passwords
  if (pwdMatch($pwd, $pwdRepeat) !== false) {
    // Send user back to the sign up page with error "passwordsdontmatch"
    header("location: ../signUp.php?error=passwordsdontmatch");
    exit();
  }

  // Error for a taken username
  if (uidExists($conn, $username, $email) !== false) {
    // Send user back to the sign up page with error "usernametaken"
    header("location: ../signUp.php?error=usernametaken");
    exit();
  }

  // Create an account with the user's sign up information
  createUser($conn, $name, $email, $username, $pwd);

}else{
  // Send user back to the sign up page
  header("location: ../signUp.php");
  exit();

}
