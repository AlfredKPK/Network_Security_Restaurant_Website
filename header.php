<?php
session_start();
require_once "config.php";
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Login Page</title>
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
  <header class="header">
    <nav class="left">
      <?php
      $userimage = "upload/pfp/".$_SESSION['nickname'].".jpg";
      $defaultimage = "../upload/default.jpg";
      if (isset($_SESSION['nickname'])) {
        echo "<p style='color:white;'>Welcome back, " . $_SESSION['nickname']."</p>";
        echo "<a href='changepfp.php'> Profile </a>";
        if(file_exists($userimage)){
          echo "<img src='upload/pfp/" . $_SESSION['nickname']. ".jpg' width='20' height ='20'>";
        } else {
          echo "<img src='upload/default.jpeg' width='20' height ='20'>";
        }
      }
      ?>
    </nav>
    <nav class="middle">
      <?php
      if (isset($_SESSION['nickname'])) {
        echo "<a href='food-menu.php'> Food menu</a>";
      }
      ?>
      <a href='index.php'>Home </a>
      <a href='about-us.php'>About us</a>
      <a href='contact-us.php'> Contact us</a>
    </nav>
    <nav class="right">
      <?php
      if (isset($_SESSION['nickname'])) {
        echo "<a href='logout.php'>Log out</a>";
      } else {
        echo "<a href='login.php'>Login</a>";
      }
      ?>
    </nav>
  </header>