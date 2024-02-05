<?php
session_start();
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
      if (isset($_SESSION['nickname'])) {
        echo $_SESSION['pfp'] . "Welcome back, " . $_SESSION['nickname'];
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