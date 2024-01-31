<!DOCTYPE html>
<html>
    <head>
        <title>New User</title>
            <h1>New User Here!</h1>
            <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link href="mystyle.css" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>
        <div class="mainscreen">
            <div class="Email-input">
                <h3>Email</h3>
                <input type="text" id="email" name="email"><br><br>
            </div>        
            <div class="login-id-input">
                <h3>login ID</h3>
                <label for="login-id">Login ID</label>
                <input type="text" id="login-id" name="login-id"><br><br>
            </div>        
            <div class="nickname-input">
                <h3>Username</h3>
                <label for="nickname">Username</label>
                <input type="text" id="nickname" name="nickname"><br><br>
            </div>        
            <div class="password-input">
                <h3>Password</h3>
                <label for="password">Password</label>
                <input type="password" id="password" name="password"><br><br>
            </div>      
            <div class="pfp-input">
                <form action="/action_page.php">
                    <label for="pfp">Upload Profile Picture Here</label>
                    <input type="file" id="pfp" name="pfp" accept="image/*">
                </form>
            </div>   
            <div class="password-i">
                <h3>Email</h3>
                <label for="password">Email</label>
                <input type="password" id="password" name="password"><br><br>
            </div>   
            <div class="submit-btn">
                <input type="submit" value="Submit">
            </div>
        </div>
    </body>