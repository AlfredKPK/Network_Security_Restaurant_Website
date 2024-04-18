<?php
include_once "header.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Login Page</title>
    <link href="css/style.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="mainscreen">
        <form action="login-script.php" method="post">

            <h1>Welcome!</h1>
            <div class="input-box">
                <input type="text" name="email" placeholder="Email/Username" required>
            </div>

            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <div class="remember-forgot">
                <label><input type="checkbox">Remember me</label>
            </div>

            <div class="g-recaptcha" data-sitekey="6LdXUb8pAAAAAJXVCg43UZi1u0NLTda78NtEXZez"></div>

            <button type="submit" id="submit" name="submit">Login</button>
            <div class="sign-up">
                <p>No account? <a href="sign-up.php">Sign up here!</a>
                    <i class='bx bxs-hand-left'></i>
                </p>
            </div>
            <div class="error-notice">
                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyinput") {
                        echo "<p> Please fill in all fields.</p>";
                    }
                    if ($_GET["error"] == "wrongcredentials") {
                        echo "<p> Incorrect Login Credentials</p>";
                    }
                }
                ?>
        </form>
    </div>
</body>



</html>