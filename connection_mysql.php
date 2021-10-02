<?php
  require_once "connection.php";

  //tạo kết nối 
  $conn = new mysqli("localhost", "root","ducnguyen@94");
  if ($conn->connect_error) {
    die("Connection failure"+ $conn->connect_error);
  }
  echo("Connect susseccfully");

  $conn->close()
?>