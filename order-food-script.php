<?php
require_once "config.php";
require_once "function.php";
if (isset($_POST["submit"])) {
  $qty = $_POST["qty"];
  $dishid = $_GET['dish'];
  $loginid = getLoginid($db);

  $sqldish = "SELECT * FROM dish WHERE dishid = '$dishid'";
  $result = $db->query($sqldish);
  $row = mysqli_fetch_assoc($result);
  $totalprice = $row['price'] * $qty;

  createOrder($db, $loginid, $dishid, $qty, $totalprice);
} else {
  header("location: ../index.php");
  exit();
}