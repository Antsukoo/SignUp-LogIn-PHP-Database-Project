<?php
//Start a session
session_start();

//"Unset" all the session variables
session_unset();

//"Destroy" all the session variables
session_destroy();

//Take user back to the home page
header("location: ../index.php");

//Exit the script
exit();
