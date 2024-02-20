<?php
include_once "header.php";
require_once "/config.php";
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
            <h1 style="text-align:center;margin-top: -10%;padding:50px;">Details</h3>
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
                <form action="order-food-script.php?dish=$dishid" method="post" enctype="multipart/form-data">
                    <h1>New Order</h1>
                    <div class="input-box">
                        <h3>Quantity</h3>
                        <input type="number" name="qty" placeholder="Quantity" required><br><br>
                    </div>
                    <button type="submit" id="submit" name="submit">Order!</button>
                </form>

                <div class="comments">
                    <?php
                    $sql = "SELECT * FROM comments WHERE dishid = $dishid";
                    $result = $db->query($sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                    "<td style='text-align:center;'>Reviewer: </td>
                    <td>" . $row['nickname'] . "</td>
                    <td style='font-size:24'>Rating: </td>
                    <td>" . $row['rating'] . "Out of 10.</td> <br>
                    <td style='font-size:24;border:10px'>Description: </td>
                    <td>" . $row['info'] . "</td> <br>";
                    }
                    ?>
                </div>

        </div>
    </div>
</body>