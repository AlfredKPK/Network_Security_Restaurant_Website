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
        <header class="header">
            <p> </p>
            <nav class="navbar">
              <a href="index.php" class="return-btn">Login</a>
            </nav>
        </header>
        <div class="mainscreen">
            <form action="">
                <h1>Welcome!</h1>
                <div class="input-box">
                    <input type="text" placeholder="Login ID" required>
                </div>

                <div class="input-box">
                    <input type="password" placeholder="Password" required>
                </div>

                <div class="remember-forgot">
                    <label><input type="checkbox">Remember me</label>
                    <a href="forget-password.php">Forgot password?</a>
                </div>
                
                <button type="button" submit class="btn">Login</button>
                <div class="sign-up">
                    <p>No account? <a href="sign-up.php">Sign up here!</a>
                    <i class='bx bxs-hand-left'></i></p>
                </div>
                </form>
        </div>
    </body>
</html>