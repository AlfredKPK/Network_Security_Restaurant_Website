<?php
include_once "header.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Forget Password</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <style>
        h3 {
            text-align: center
        }
    </style>
</head>

<body>
    <div class="mainscreen">
        <h1>Forget Password</h1>
        <div class="input-box">
            <h3>Email</h3>
            <input type="text" placeholder="email" required><br><br>
        </div>
        <div class="input-box">
            <h3>Password</h3>
            <label for="password"></label>
            <input type="password" placeholder="Password" required><br><br>
        </div>
        <div class="input-box">
                <h3>Confirm Password</h3>
                <label for="password-confirm"></label>
                <input type="password" name="password-confirm" placeholder="Confirm Password" required><br><br>
            </div>
            <button type="button" submit class="btn">Continue</button>
        </div>
</body>