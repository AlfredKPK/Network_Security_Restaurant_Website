<?php
if(isset($_POST["submit"])){
  $file = $_FILES["pfp"];
  $filename = $_FILES["pfp"]["name"];
  $filetemp = $_FILES["pfp"]["temp"];
  $filesize = $_FILES["pfp"]["size"];
  $fileerror = $_FILES["pfp"]["error"];

  require_once "function.php";
  require_once "config.php";

  checkimage($filename, $filetemp, $filesize, $fileerror);
  uploadimage($db, $filename);
}