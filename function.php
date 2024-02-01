<?php
  function emptySignup($email, $nickname, $password, $passwordconfirm){
    if(!empty($name) || empty($email) || empty($password) || empty($passwordconfirm)){
      $result = true;
    }
    else{
      $result = false;
    }
    return $result;
  }

  function invalidEmail($email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $result = true;
    }
    else {
      $result = false;
    }
    return $result;
  }
  function passwordSame($password, $passwordconfirm){
    if($password !== $passwordconfirm){
      $result = true;
    }
    else {
      $result = false;
    }
    return $result;
  }
  function nicknameExists($db, $nickname){
    $sql = "SELECT * FROM users WHERE nickname = ?;";
    $check = mysqli_stmt_init($db);
    if(!mysqli_stmt_prepare($check, $sql)){
      header("location: sign-up.php?error=databaseerror");
      exit();
    }
    mysqli_stmt_bind_param($check, "s", $nickname);
    mysqli_stmt_execute($check);
    $resultCheck = mysqli_stmt_get_result($check);
    if($row = mysqli_fetch_assoc($resultCheck)){
      return $row;
    }
    else {
      $result = false;
      return $result;
    }
    mysqli_stmt_close($check);
  }
  function emailExists($db, $email){
    $sql = "SELECT * FROM users WHERE email = ?;";
    $check = mysqli_stmt_init($db);
    if(!mysqli_stmt_prepare($check, $sql)){
      header("location: sign-up.php?error=databaseerror");
      exit();
    }
    mysqli_stmt_bind_param($check, "s", $email);
    mysqli_stmt_execute($check);
    $resultCheck = mysqli_stmt_get_result($check);
    if($row = mysqli_fetch_assoc($resultCheck)){
      return $row;
    }
    else {
      $result = false;
      return $result;
    }
    mysqli_stmt_close($check);
  }

  function createUser($db, $email, $nickname, $password, $pfp, $role){
    $sql = "INSERT INTO users(email, nickname, pwd, pfp, isAdmin) VALUES (?, ?, ?, ?, ?);";
    $check = mysqli_stmt_init($db);
    if(!mysqli_stmt_prepare($check, $sql)){
      header("location: sign-up.php?error=databaseerror");
      exit();
    }
    $hashpassword = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($check, "ssssb", $email, $nickname, $hashpassword, $pfp, $role);
    mysqli_stmt_execute($check);
    mysqli_stmt_close($check);
    header("location: sign-up.php?error=none");
    exit();
  } 