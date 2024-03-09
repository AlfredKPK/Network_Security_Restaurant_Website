<?php
  require_once "header.php";
  $dishid = $_GET['dish'];
  $sql = "DELETE FROM comment where dishid = $dishid";
  $query_run = mysqli_query($db, $sql);
  if($query_run){
    try{
      $sql = "DELETE FROM dish where dishid = $dishid";
      $query_run = mysqli_query($db, $sql);
      if($query_run){
        header("location: menu.php?error=none");
      }
    }catch(Exception $e){
      header("location: menu.php?error=unfinishedorders");
    }
  
  }
  else{
  header("location: menu.php?error=databaseerror");
  }