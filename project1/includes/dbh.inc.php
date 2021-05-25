<?php

/*

Variables for the website server

$serverName = "sql102.epizy.com";
$dBUsername = "epiz_28347819";
$dBPassword = "NzdHZo3IFO";
$dBName = "epiz_28347819_keketask";
*/


// Variables for the local host server
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "phpproject1";


// Create the connection to the database
$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

// If connection failed show error message with the error told by the database
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());

}
