<?php
include_once "header.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>New Food</title>
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
        <form action="new-food-script.php" method="post" enctype="multipart/form-data">
            <h1>New Dish</h1>
            <div class="input-box">
                <h3>Dish Name</h3>
                <input type="text" name="foodname" placeholder="Food Name" required><br><br>
            </div>
            <div class="input-box">
                <h3>Price</h3>
                <label for="price"></label>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
                <input type="text" class="float" name="price" placeholder="Price" required><br><br>
                <script>
                    $('input.float').on('input', function() {
                        this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');
                    });
                </script>
            </div>
            <div class="text-area">
                <h3>Description</h3>
                <label for="desc"></label>
                <textarea name="desc" placeholder="Description Here" cols="28" rows="5" required></textarea><br><br>
            </div>
            <h3>Upload Profile Picture Here</h3>
            <p> Maximum size allowed: 10MB </p>
            <input type="file" name="foodimg" style='margin-bottom: 30px;' required>
            <button type="submit" id="submit" name="submit">Add</button>
            <div class="error-notice">
                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyinput") {
                        echo "<p> Please fill in all fields.</p>";
                    }
                    if ($_GET["error"] == "databaseerror") {
                        echo "<p> Something went wrong, please try again.</p>";
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
                }
                ?>
            </div>
        </form>
    </div>
</body>

</html>