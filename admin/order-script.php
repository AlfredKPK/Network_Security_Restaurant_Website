<?php
  require_once "header.php";
  $orderid = $_GET['order'];
  $sql = "DELETE FROM foodorder where orderid = $orderid";
  $query_run = mysqli_query($db, $sql);
  if($query_run){
  header("location: order.php?error=none");
  }
  else{
  header("location: order.php?error=databaseerror");
  }