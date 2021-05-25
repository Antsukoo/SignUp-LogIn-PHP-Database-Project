<?php

//Function for an error if sign up inputs are emty
function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) {

  $result;
  if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)){
    $result = true;
  }else{
    $result = false;
  }
  return $result;

}

//Function for an invalid username
function invalidUid($username) {

  $result;
  if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
    $result = true;
  }else{
    $result = false;
  }
  return $result;

}

//Function for an invalid email
function invalidEmail($email) {

  $result;
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $result = true;
  }else{
    $result = false;
  }
  return $result;

}

//Function for non matching passwords in the sign up form
function pwdMatch($pwd, $pwdRepeat) {

  $result;
  if ($pwd !== $pwdRepeat){
    $result = true;
  }else{
    $result = false;
  }
  return $result;

}

//Function for a taken username
function uidExists($conn, $username, $email) {

  $sql = "SELECT * FROM users WHERE userUid = ? OR userEmail = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    // Send user back to the sign up page with error "stmtfailed"
    header("location: ../signUp.php?error=stmtfailed");
    // Exit the script
    exit();
  }

  mysqli_stmt_bind_param($stmt, "ss", $username, $email);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  //Used for the login
  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  }else{
    $result = false;
    return $result;
  }

  mysqli_stmt_close($stmt);

}

// Function for creating the user using prepared statements
function createUser($conn, $name, $email, $username, $pwd) {

  $sql = "INSERT INTO users (userUid, userName, userEmail, userPassword) VALUES (?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    // Send user back to the sign up page with error "stmtfailed"
    header("location: ../signUp.php?error=stmtfailed");
    // Exit the script
    exit();
  }

  // Hash the user's password
  $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

  mysqli_stmt_bind_param($stmt, "ssss", $username, $name, $email, $hashedPwd);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  // Send user back to the sign up page with no error
  header("location: ../signUp.php?error=none");
  // Exit the script
  exit();
}

// Function for empty login infomation
function emptyInputLogin($username, $pwd) {

  $result;
  if (empty($username) || empty($pwd)){
    $result = true;
  }else{
    $result = false;
  }
  return $result;

}

// Function for logging in the user
function loginUser($conn, $username, $pwd){
  $uidExists = uidExists($conn, $username, $username);

  // If the uid used in the log in does not exist
  if ($uidExists === false) {
    // Send user back to the log in page with error "wronglogin"
    header("location: ../logIn.php?error=wronglogin");
    // Exit the script
    exit();
  }

  $pwdHashed = $uidExists["userPassword"];
  $checkPwd = password_verify($pwd, $pwdHashed);

  // If password does not match the user's hashed password
  if ($checkPwd === false) {
    // Send user back to the log in page with error "wronglogin"
    header("location: ../logIn.php?error=wronglogin");
    // Exit the script
    exit();
  }

  // If password is correct login the user
  else if ($checkPwd === true){

    // Start the session
    session_start();

    // Set the session variables
    $_SESSION["userid"] = $uidExists["userID"];
    $_SESSION["useruid"] = $uidExists["userUid"];
    $_SESSION["username"] = $uidExists["userName"];

    // Send user back to the home page
    header("location: ../index.php");
    // Exit the script
    exit();
  }
}
