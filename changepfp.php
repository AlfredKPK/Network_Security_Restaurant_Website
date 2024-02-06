<?php
include_once "header.php";
require_once "config.php";
?>

<!DOCTYPE html>
<html>

<head>
  <title>Change Profile Picture</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
  <div class="largescreen">
    <div class="longdesc">
      <div class="pfppage">
        <h3>Upload Profile Picture Here</h3>
        <p> Maximum size allowed: 10MB </p>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
          <input type="file" name="pfp">
          <button type="submit" name="submit">Upload Profile Picture</button>
        </form>
      </div>
      <div class="error-notice">
        <?php
        if (isset($_GET["error"])) {
          if ($_GET["error"] == "none") {
            echo "<p>Upload sucessful!</p>";
          }
          if ($_GET["error"] == "filetoolarge") {
            echo "<p> Your file exceeds 10 MB.</p>";
          }
          if ($_GET["error"] == "somethingwrong") {
            echo "<p>Something went wrong, please try again</p>";
          }
          if ($_GET["error"] == "wrongformat") {
            echo "<p> Only JPG, JPEG, PNG, and TIFF formats are allowed</p>";
          }
          if ($_GET["error"] == "nouser") {
            echo "<p> No such user, directing back to login page.</p>";
            header("location: login.php");
          }
        }
        ?>
      </div>
    </div>
  </div>
</body>