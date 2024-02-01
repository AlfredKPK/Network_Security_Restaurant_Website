<?php
  session_start();
  if(!isset($_SESSION["loginid"]) || $_SESSION["loginid"] !== true){
    header("location: login.php");
    exit;
  }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Hello!</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="images/background.jpg">
        <link href="css/style.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
        <header class="header">
          <p>Welcome, name!</p>
          <nav class="navbar">
            <a href="home.php" class="home-btn">Home</a>
            <a href="food-menu.php" class="menu-btn">Menu</a>
            <a href="about-us.php" class="about-us-btn">About</a>
            <a href="contact-us.php" class="contact-us-btn">Contact</a>
          </nav>
        </header>

        <header class="home" id="home">
            <div class="time-open">
              <span class="w3-tag w3-xlarge">Open from 10am to 12pm</span>
            </div>
            <div class="center">
              <span class="small" style="font-size:100px">Pizza<br>Pasta</span>
              <span class="medium" style="font-size:60px"><b><br>Spaghetti</b></span>
            </div>
          </header>
    </body>
</html>