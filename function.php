<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
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

function createUser($db, $email, $nickname, $password)
{
  $sql = "INSERT INTO users(email, nickname, pwd) VALUES (?, ?, ?);";
  $check = mysqli_stmt_init($db);
  if (!mysqli_stmt_prepare($check, $sql)) {
    header("location: sign-up.php?error=databaseerror");
    exit();
  }
  $hashpassword = password_hash($password, PASSWORD_DEFAULT);
  mysqli_stmt_bind_param($check, "sss", $email, $nickname, $hashpassword);
  mysqli_stmt_execute($check);
  mysqli_stmt_close($check);
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

function emptyNewFood($foodname, $price, $desc)
{
  if (empty($foodname) || empty($price) || empty($desc)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function createDish($db, $foodname, $price, $desc)
{
  $sql = "INSERT INTO dish(name, price, description) VALUES (?, ?, ?);";
  $check = mysqli_stmt_init($db);
  if (!mysqli_stmt_prepare($check, $sql)) {
    header("location: sign-up.php?error=databaseerror");
    exit();
  }
  mysqli_stmt_bind_param($check, "sss", $foodname, $price, $desc);
  mysqli_stmt_execute($check);
  mysqli_stmt_close($check);
  echo '<script>alert("New Food Added!")</script>'; 
  header("location: ../admin/menu.php?error=none");
  exit();
}