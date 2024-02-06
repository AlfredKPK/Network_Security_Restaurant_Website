<?php
if(isset($_POST["submit"])){
  $file = $_FILES["pfp"];
  $filename = $_FILES["pfp"]["name"];
  $filetemp = $_FILES["pfp"]["tmp_name"];
  $filesize = $_FILES["pfp"]["size"];
  $fileerror = $_FILES["pfp"]["error"];
  $filetype = $_FILES["pfp"]["type"];

  require_once "function.php";
  require_once "config.php";
  require_once "header.php";

  $fileexplode = explode(".", $filename);
  $filelower = strtolower(end($fileexplode));
  $filetype = array("jpg", "jpeg", "png", "tiff");

  if(in_array($filelower, $filetype)){
    if($fileerror === 0){
      if($filesize < 1000000){
        $filenamenew = $_SESSION['nickname'].".".$filelower;
        $filedest = 'upload/pfp/'.$filenamenew;
        $name = $_SESSION['nickname'];
        move_uploaded_file($filetemp, $filedest);
        rename('upload/pfp/'.$filenamenew,'upload/pfp/'.$name.'.jpg');
        header("Location: changepfp.php?error=none");
      }else {
        header("Location: changepfp.php?error=filetoolarge");
        exit();
      }
    }else {
      header("Location: changepfp.php?error=somethingwrong");
      exit();
    }
  } else {
    header("Location: changepfp.php?error=wrongformat");
    exit();
  }
}