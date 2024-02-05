<?php

function emptySignup($email, $nickname, $password, $passwordconfirm)
{
  if (empty($nickname) || empty($email) || empty($password) || empty($passwordconfirm)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function invalidEmail($email)
{
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}
function passwordSame($password, $passwordconfirm)
{
  if ($password !== $passwordconfirm) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}
function nicknameExists($db, $nickname)
{
  $sql = "SELECT * FROM users WHERE nickname = ?;";
  $check = mysqli_stmt_init($db);
  if (!mysqli_stmt_prepare($check, $sql)) {
    header("location: sign-up.php?error=databaseerror");
    exit();
  }
  mysqli_stmt_bind_param($check, "s", $nickname);
  mysqli_stmt_execute($check);
  $resultCheck = mysqli_stmt_get_result($check);
  if ($row = mysqli_fetch_assoc($resultCheck)) {
    return $row;
  } else {
    $result = false;
    return $result;
  }
  mysqli_stmt_close($check);
}
function emailExists($db, $email)
{
  $sql = "SELECT * FROM users WHERE email = ?;";
  $check = mysqli_stmt_init($db);
  if (!mysqli_stmt_prepare($check, $sql)) {
    header("location: sign-up.php?error=databaseerror");
    exit();
  }
  mysqli_stmt_bind_param($check, "s", $email);
  mysqli_stmt_execute($check);
  $resultCheck = mysqli_stmt_get_result($check);
  if ($row = mysqli_fetch_assoc($resultCheck)) {
    return $row;
  } else {
    $result = false;
    return $result;
  }
  mysqli_stmt_close($check);
}

function userExists($db, $email, $nickname)
{
  $sql = "SELECT * FROM users WHERE email = ? OR nickname = ?;";
  $check = mysqli_stmt_init($db);
  if (!mysqli_stmt_prepare($check, $sql)) {
    header("location: sign-up.php?error=databaseerror");
    exit();
  }
  mysqli_stmt_bind_param($check, "ss", $email, $nickname);
  mysqli_stmt_execute($check);
  $resultCheck = mysqli_stmt_get_result($check);
  if ($row = mysqli_fetch_assoc($resultCheck)) {
    return $row;
  } else {
    $result = false;
    return $result;
  }
  mysqli_stmt_close($check);
}

function passwordTooShort($password){
  if (strlen($password) < 6) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function createUser($db, $email, $nickname, $password, $pfp, $role)
{
  $sql = "INSERT INTO users(email, nickname, pwd, pfp, isAdmin) VALUES (?, ?, ?, ?, ?);";
  $check = mysqli_stmt_init($db);
  if (!mysqli_stmt_prepare($check, $sql)) {
    header("location: sign-up.php?error=databaseerror");
    exit();
  }
  $hashpassword = password_hash($password, PASSWORD_DEFAULT);
  mysqli_stmt_bind_param($check, "ssssb", $email, $nickname, $hashpassword, $pfp, $role);
  mysqli_stmt_execute($check);
  mysqli_stmt_close($check);
  $sql = "SELECT login-id FROM users ORDER BY id DESC LIMIT 1";
  $sql2 = "INSERT INTO profileimg (login-id, status) VALUES ($sql, 1);";
  echo '<script>alert("Register successful! Please login again.")</script>'; 
  header("location: login.php?error=none");
  exit();
}

function emptyLogin($email, $password,)
{
  if (empty($email) || empty($password)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function loginUser($db , $email, $password)
{
  $userExists = userExists($db, $email, $email);
  if($userExists === false){
    header("location: login.php?error=wrongcredentials");
    exit();
  }
  $hashpassword = $userExists["pwd"];
  $checkpassword = password_verify($password, $hashpassword);

  if($checkpassword === false){
      header("location: login.php?error=wrongcredentials");
      exit();
    }
  else if($checkpassword === true){
    session_start();
    $_SESSION["nickname"] = $userExists["nickname"];
    header("location: index.php");
    exit();
  }
}

function checkimage($filename, $filetemp, $filesize, $fileerror)
{
  $fileexplode = explode(".", $filename);
  $filelower = strtolower(end($fileexplode));
  $filetype = array("jpg", "jpeg", "png", "tiff");

  if(in_array($filelower, $filetype)){
    if($fileerror === 0){
      if($filesize < 10000000) {
        $filenamecorrected = uniqid("", true).".".$filelower;
        $filelocation = "EIE3117/upload/" .$filenamecorrected;
        move_uploaded_file($filetemp, $filelocation);
        header("location: changepfp.php?error=none");
        exit();
      } else{
        header("location: changepfp.php?error=filetoolarge");
        exit();
      }
    } else{
      header("location: changepfp.php?error=somethingwrong");
      exit();
    }
  } else {
    header("location: changepfp.php?error=wrongformat");
    exit();
  }
}

function uploadimage($db, $filename)
{
  $sql = "SELECT * FROM users";
  $result = mysqli_query($db, $sql);
  if(mysqli_num_rows($result) > 0 ){
    while($row = mysqli_fetch_assoc($result)){
      $id = $row['login-id'];
      $sqlimage = "SELECT * FROM profileimg WHERE userid='$id';";
      $resultimage = mysqli_query($db, $sqlimage);
      while($rowimage = mysqli_fetch_assoc($resultimage)){
        echo "<div>";
        if ($rowimage['status'] == 0){
          $fileexplode = explode(".", $filename);
          echo "<img src='upload/'.$id.$fileexplode>";
        } else {
          echo "<img src='upload/default.jpeg'>";
        }
        echo $row['nickname'];
        echo "</div>";
      }
    }
  } else{
    header("location: changepfp.php?error=nouser");
  }
}