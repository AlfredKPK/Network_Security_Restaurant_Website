<?php
include_once "header.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Food Menu</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="largescreen">
        <div>
            <h1 style="text-align:center;margin-top: -10%;padding:50px;">Food Menu</h3>
                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "databaseerror") {
                        echo "<p style='text-align:center;'> Something went wrong, please try again.</p>";
                    }
                    if ($_GET["error"] == "none") {
                        echo "<p style='text-align:center;'> Order Complete!</p>";
                    }
                    if ($_GET["error"] == "comment") {
                        echo "<p style='text-align:center;'> Thank You for your comment!</p>";
                    }
                }
                ?>
                <?php
                $sql = "SELECT * FROM dish";
                $result = $db->query($sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $foodname = $row['name'];
                    $nospacefoodname = str_replace(' ', '', $foodname);;
                    $dishid = $row['dishid'];
                    echo "<div class='side-by-side'>
                            <tr>
                                <td>" . $row['name'] . "</td><br>
                            </tr>
                            <div class='pictures'>
                            <img align='right' src='upload/food/$nospacefoodname.jpg' style='width:300px;height:250px'>
                            </div>
                          </div>
                          <form action='view-food.php?dish=$dishid' method='post'>
                          <button type='submit' id='submit' name='submit'>More details Here</button>
                          </form>
                          ";
                }
                ?>
                <tr>
                </tr>
        </div>
    </div>
</body>

</html>