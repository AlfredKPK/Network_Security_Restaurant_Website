<?php
if (isset($_POST["submit"])) {
  $foodname = $_POST["foodname"];
  $price = $_POST["price"];
  $desc = $_POST["desc"];
  $file = $_FILES["foodimg"];
  $filename = $_FILES["foodimg"]["name"];
  $filetemp = $_FILES["foodimg"]["tmp_name"];
  $filesize = $_FILES["foodimg"]["size"];
  $fileerror = $_FILES["foodimg"]["error"];
  $filetype = $_FILES["foodimg"]["type"];

  require_once "../function.php";
  require_once "../config.php";

  if (emptyNewFood($foodname, $price, $desc) !== false) {
    header("location: new-food.php?error=emptyinput");
    exit();
  }

  $fileexplode = explode(".", $filename);
  $filelower = strtolower(end($fileexplode));
  $filetype = array("jpg", "jpeg", "png", "tiff");

  if (in_array($filelower, $filetype)) {
    if ($fileerror === 0) {
      if ($filesize < 1000000) {
        $filenamenew = $foodname . "." . $filelower;
        $filedest = '../upload/food/' . $filenamenew;
        $nospacefoodname = str_replace(' ', '', $foodname);;
        move_uploaded_file($filetemp, $filedest);
        rename('../upload/food/' . $filenamenew, '../upload/food/' . $nospacefoodname . '.jpg');
        header("Location: new-food.php?error=none");
      } else {
        header("Location: new-food.php?error=filetoolarge");
        exit();
      }
    } else {
      header("Location: new-food.php?error=somethingwrong");
      exit();
    }
  } else {
    header("Location: new-food.php?error=wrongformat");
    exit();
  }
  createDish($db, $foodname, $price, $desc, $totalprice);
  exit();
} else {
  header("location: ../index.php");
  exit();
}
