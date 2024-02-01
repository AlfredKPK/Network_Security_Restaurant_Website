<?php
  if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $nickname = $_POST["nickname"];
    $password = $_POST["password"];
    $passwordconfirm = $_POST["password-confirm"];
    $pfp = $_FILES["pfp"];

    require_once "function.php";
    require_once "config.php";
    
    if(emptySignup($email, $nickname, $password, $passwordconfirm, $pfp) !== false){
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
    createUser($db, $email, $nickname, $password, $pfp, $role);
    exit();
  }
  else {
    header("location: index.php");
    exit();
  }