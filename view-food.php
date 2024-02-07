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
        <div class="admin-view">
            <h1 style="text-align:center;margin-top: -10%;padding:50px;">Food Menu</h3>
                <div class="side-by-side">
                    <?php
                    $sql = "SELECT * FROM dish";
                    $result = $db->query($sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $image = $row['image'];
                        $dishid = $row['dish-id'];
                        echo "<tr>
                              <td style='font-size: 24'>Dish: </td>
                              <td>" . $row['name'] . "</td> <br>
                              <td style='font-size: 24'>Description: </td>
                              <td>" . $row['description'] . "</td> <br>
                              <td style='font-size: 24'>Price: </td>
                              <td>" . $row['price'] . "</td> <br>
                              <div class='pictures'>
                              <img align='right' src='images/food/'.$image.'.png' style='width:300px;height:250px';>
                              </div>
                              <td>" . $row['image'] . "</td> <br>
                              <a href='view-food.php?dish='.$dishid.'>More details Here</a>";     
                    ?>
                </div>
                <tr>
                </tr>
        </div>
    </div>
</body>