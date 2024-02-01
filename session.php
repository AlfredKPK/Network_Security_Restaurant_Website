<?php
    session_start();
    if(isset($_SESSION["loginid"]) && $_SESSION["loginid"] = true){
        header("location: home.php");
        exit();
    }