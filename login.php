<?php

  session_start();
  $_SESSION["username"] = "admin";

  if (isset($_SESSION["login"]) || $_SESSION["login"] === true) {
    header("location:create.php");
    exit;
  }


?>