<?php
  if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    require_once "function.php";
    require_once "config.php";

    if(emptyLogin($email, $password) !== false){
      header("location: login.php?error=emptyinput");
      exit();
    }

    loginUser($db, $email, $password);

  }
  else {
    
    header("location: login.php");
    exit();
  }