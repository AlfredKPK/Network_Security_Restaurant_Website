<?php
session_start();
require_once "../config.php";
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link href="../css/style.css" rel="stylesheet">
</head>

<body>
  <header class="header">
    <nav class="left">
      <?php
      if (isset($_SESSION['nickname'])) {
        $userimage = "../upload/pfp/" . $_SESSION['nickname'] . ".jpg";
        $defaultimage = "../upload/default.jpg";
        echo "<p style='color:white;'>Welcome back, " . $_SESSION['nickname'] . "</p>";
        echo "<a href='changepfp.php'> Profile </a>";
        if (file_exists($userimage)) {
          echo "<img src='../upload/pfp/" . $_SESSION['nickname'] . ".jpg' width='20' height ='20'>";
        } else {
          echo "<img src='../upload/default.jpeg' width='20' height ='20'>";
        }
      }
      ?>
    </nav>
    <nav class="middle">
      <?php
      if (isset($_SESSION['nickname'])) {
        echo "<a href='../admin/account.php'> Account</a>";
        echo "<a href='../admin/menu.php'> Food menu</a>";
        echo "<a href='../admin/order.php'> Orders</a>";
      }
      ?>
    </nav>
    <nav class="right">
      <?php
      if (isset($_SESSION['nickname'])) {
        echo "<a href='../logout.php'>Log out</a>";
      } else {
        echo "<a href='../login.php'>Login</a>";
      }
      ?>
    </nav>
  </header>