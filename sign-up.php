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
            <h1>New User</h1>
            <div class="input-box">
                <h3>Email</h3>
                <input type="text" placeholder="Email" required><br><br>
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
            <div class="pfp-input">
                <form action="upload.php">
                    <label for="pfp">Upload Profile Picture Here</label>
                    <input type="file" id="pfp" name="pfp" accept="image/*">
                </form>
                <button type="button" submit class="btn">Continue</button>
        </div>
    </body>