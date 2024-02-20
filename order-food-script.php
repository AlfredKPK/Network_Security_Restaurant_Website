<?php
if (isset($_POST["submit"])) {
  $qty = $_POST["qty"];

  require_once "../function.php";
  require_once "../config.php";
  $dishid = $_GET['dish'];
  createOrder($db, $dishid, $qty);
} else {
  header("location: ../index.php");
  exit();
}
