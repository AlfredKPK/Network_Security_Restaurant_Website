<?php
include_once "header.php";
require_once "config.php";
require_once "function.php";
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
            <h1 style="text-align:center;margin-top: -10%;padding:50px;">Details</h1>
                <div class="side-by-side">
                    <?php
                    $dishid = $_GET['dish'];
                    $sql = "SELECT * FROM dish WHERE dishid = $dishid";
                    $result = $db->query($sql);
                    $row = mysqli_fetch_assoc($result);
                    $foodname = $row['name'];
                    $nospacefoodname = str_replace(' ', '', $foodname);
                    echo "<tr>
                              <td style='text-align:center;'>Dish: </td>
                              <td>" . $row['name'] . "</td> <br>
                              <td style='font-size:24'>Price: $</td>
                              <td>" . $row['price'] . "HKD</td> <br>
                              <td style='font-size:24;border:10px'>Description: </td>
                              <td>" . $row['description'] . "</td> <br>
                              <div class='pictures'>
                              <img align='right' src='upload/food/$nospacefoodname.jpg' style='width:300px;height:250px'>
                              </div>";
                    ?>
                </div>
                <?php
                 echo "<form action='order-food-script.php?dish=$dishid' method='post' enctype='multipart/form-data'>
                    <h1 style='text-align: center;'>New Order</h1>
                    <div class='input-box'>
                        <h3>Quantity</h3>
                        <input type='number' name='qty' placeholder='Quantity' required><br><br>
                    </div>
                    <button type='submit' id='submit' name='submit'>Order!</button>
                </form>"
                ?>

                
                <?php
                if (isset($_GET["order"])) {
                    if ($_GET["order"] == "complete") {
                        echo "<p>Order Complete! You can leave comment below</p><br>";
                        echo "<form action='comment-script.php?dish=$dishid' method='post' enctype='multipart/form-data'>
                        <h1 style='text-align: center;'>New Review</h1>
                        <div class='input-box'>
                            <h3>Rating (0 to 10)</h3>
                            <input type='number' name='rating' placeholder='rating' min='0' max='10' step='1' required><br><br>
                            <script>$( document ).ready(function() {
                                $('input').change(function() {
                                  var n = $('input').val();
                                  if (n < 3)
                                    $('input').val(3);
                                  if (n > 7)
                                    $('input').val(7);
                                });
                            });</script>
                        </div>
                        <div class='input-box'>
                            <h3>Comment</h3>
                            <input type='text' name='info' placeholder='Comment Here' required><br><br>
                        </div>
                        <button type='submit' id='submit' name='submit'>Comment</button>
                    </form>";
                    }
                }
                ?>
                <br><br><br><br>
                <h1 style="text-align:center;margin-top: -10%;padding:50px;">Reviews</h1>
                <div class="comments">
                    <?php
                    $sql = "SELECT * FROM comment WHERE dishid = $dishid";
                    $result = $db->query($sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $nickname = getnickname($db, $row['loginid']);
                        echo "<td style='text-align:center;'>Reviewer: </td>
                        <td>" . $nickname . "</td>
                        <td style='font-size:24'>Rating: </td>
                        <td>" . $row['rating'] . " Out of 10.</td> <br>
                        <td style='font-size:24;border:10px'>Review: <br> </td>
                        <td>" . $row['info'] . "</td> <br>";
                    }
                    ?>
                </div>

        </div>
    </div>
</body>