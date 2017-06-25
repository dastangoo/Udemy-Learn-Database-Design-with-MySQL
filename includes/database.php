<?php
// Connet to MySQL

$db_host = 'localhost';
$db_name = 'store2';
$db_user = 'root';
$db_pass = 'root';

// Create mysqli Object
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

if (mysqli_connect_errno()) {
  // printf("Connect failed: %s\n", mysqli_connect_errno());
  echo 'This Connection Failed'.mysqli_connect_errno();
  // exit();
  die();
}
 ?>
