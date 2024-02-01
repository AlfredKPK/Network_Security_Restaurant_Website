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
    <header class="header">
        <p> </p>
        <nav class="navbar">
            <a href="index.php" class="return-btn">Login</a>
        </nav>
    </header>

    <div class="mainscreen">
        <form action="sign-up-process.php" method="post">
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
            <div class="pfp-input">
                <label for="pfp">Upload Profile Picture Here</label>
                <input type="file" id="pfp" name="pfp" accept="image/*">
            </div>
            <button type="submit" id="submit" name="submit">Sign up!</button>
        </form>
    </div>
</body>
</html>