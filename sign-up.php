<?php
include_once "header.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>New User</title>
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
        <form action="sign-up-script.php" method="post">
            <h1>New User</h1>
            <div class="input-box">
                <h3>Email</h3>
                <input type="email" name="email" placeholder="Email" required><br><br>
            </div>
            <div class="input-box">
                <h3>Username</h3>
                <label for="nickname"></label>
                <input type="text" name="nickname" placeholder="Username" required><br><br>
            </div>
            <div class="input-box">
                <h3>Password</h3>
                <label for="password"></label>
                <input type="password" name="password" placeholder="Password" required><br><br>
            </div>
            <div class="input-box">
                <h3>Confirm Password</h3>
                <label for="password-confirm"></label>
                <input type="password" name="password-confirm" placeholder="Confirm Password" required><br><br>
            </div>
            <button type="submit" id="submit" name="submit">Sign up!</button>
            <div class="error-notice">
            <?php
                if(isset($_GET["error"])){
                    if($_GET["error"] == "emptyinput"){
                        echo"<p> Please fill in all fields.</p>";
                    }
                    if($_GET["error"] == "invalidemail"){
                        echo"<p> Email is invalid.</p>";
                    } 
                    if($_GET["error"] == "epasswordsarenotsame"){
                        echo"<p> Passwords does not match.</p>";
                    }
                    if($_GET["error"] == "usernametaken"){
                        echo"<p> Username is taken already.</p>";
                    }
                    if($_GET["error"] == "emailtaken"){
                        echo"<p> Email is taken already.</p>";
                    }
                    if($_GET["error"] == "passwordtooshort"){
                        echo"<p> Password must be at least 6 characters long.</p>";
                    }
                }
            ?>
            </div>
        </form>
    </div>
</body>
</html>