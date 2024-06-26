<?php
  if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $nicknametemp = $_POST["nickname"];
    $nickname = preg_replace("/[^a-zA-Z0-9]/", "", $nicknametemp);
    $password = $_POST["password"];
    $passwordconfirm = $_POST["password-confirm"];
    $role = 0;

    require_once "function.php";
    require_once "config.php";
    
    if(emptySignup($email, $nickname, $password, $passwordconfirm) !== false){
      header("location: sign-up.php?error=emptyinput");
      exit();
    }
    if(invalidEmail($email) !== false){
      header("location: sign-up.php?error=invalidemail");
      exit();
    }
    if(passwordSame($password, $passwordconfirm) !== false){
      header("location: sign-up.php?error=passwordsarenotsame");
      exit();
    }
    if(nicknameExists($db, $nickname) !== false){
      header("location: sign-up.php?error=usernametaken");
      exit();
    }
    if(emailExists($db, $email) !== false){
      header("location: sign-up.php?error=emailtaken");
      exit();
    }
    if(passwordTooShort($password) !== false){
      header("location: sign-up.php?error=passwordtooshort");
      exit();
    }
    createUser($db, $email, $nickname, $password);
    exit();
  }
  else {
    header("location: index.php");
    exit();
  }