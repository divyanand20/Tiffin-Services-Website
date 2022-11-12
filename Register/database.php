<?php
$hostName = "localhost";
$userName = "root";
$password = "";
$databaseName = "tiffin";
 $conn = new mysqli($hostName, $userName, $password, $databaseName);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>