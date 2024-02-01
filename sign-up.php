<?php
    require_once "config.php";
    require_once "session.php";

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
        $email = trim($_POST['email']);
        $loginid = trim($_POST['loginid']);
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $confirm_password = trim($_POST["password-confirm"]);
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        if($query = $db->prepare("SELECCT * FROM users WHERE email = ?")){
            $error = '';
        $query->bind_param('s', $email);
        $query->execute();
        $query->store_result();
            if($query->num_rows >0){
                $error .= '<p class="error"> The email address is already registered!</p>';
            } else {
                if(strlen($password) < 6) {
                    $error .= '<p class="error">Password must be at least 6 characters long.</p>';
                }

                if(empty($confirm_password)) {
                    $error .= '<p class = "error> Confirm password must not be empty.</p>';
                } else {
                    if(empty($error) && ($password != $confirm_password)){
                        $error .= '<p class="error"> Passwords did not match. </p>';
                    }
                }
                if(empty($error)){
                    $insertQuery = $db->prepare("INSERT INTO users (email, loginid, username, password) VALUES (?,?,?);");
                    $insertQuery->bind_param("sss", $fullname, $email, $password_hash);
                    $result = $insertQuery->execute();
                    if($result){
                        $error .= '<p class="success"> Your registration is successful.</p>';
                    } else {
                        $error .= '<p class="error"> Something went wrong!</p>';
                    }
                }
            }
        }
        $query->close();
        $insertQuery->close();
        mysqli_close($db);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>New User</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width,initial-scale=1.0">
            <link href="css/style.css" rel="stylesheet">
            <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
            <style>
            h3 {text-align: center}
            </style>
    </head>
    <body>
        <header class="header">
            <p> </p>
            <nav class="navbar">
              <a href="index.php" class="index-btn">Login</a>
            </nav>
          </header>

        <div class="mainscreen">
            <form action"" method="post">
            <h1>New User</h1>
            <div class="input-box">
                <h3>Email</h3>
                <input type="email" placeholder="Email" required><br><br>
            </div>        
            <div class="input-box">
                <h3>login ID</h3>
                <label for="login-id"></label>
                <input type="text" placeholder="Login ID" required"><br><br>
            </div>        
            <div class="input-box">
                <h3>Username</h3>
                <label for="nickname"></label>
                <input type="text" placeholder="Username" required><br><br>
            </div>        
            <div class="input-box">
                <h3>Password</h3>
                <label for="password"></label>
                <input type="password" placeholder="Password" required><br><br>
            </div>      
            <div class="input-box">
                <h3>Password</h3>
                <label for="password-confirm"></label>
                <input type="password" placeholder="Confirm Password" required><br><br>
            </div>      
            <div class="pfp-input">
                <label for="pfp">Upload Profile Picture Here</label>
                <input type="file" id="pfp" name="pfp" accept="image/*">
                <button type="button" submit class="btn">Continue</button>
            </div>
            </form>
        </div>    
    </body>