<?php
require_once "config.php";
require_once "function.php";
if (isset($_POST["submit"])) {
  $dishid = $_GET['dish'];
  $rating = $_POST["rating"];
  $info = $_POST["info"];
  $loginid = getLoginid($db);

  createComment($db, $loginid, $dishid, $rating, $info);
} else {
  header("location: ../index.php");
  exit();
}
