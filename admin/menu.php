<?php
include_once "header.php";
?>

<!DOCTYPE html>
<html>

<head>
  <title>Hello!</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="images/background.jpg">
  <link href="css/style.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<div class="largescreen">
    <div class="admin-view">
      <h1 style="text-align:center;margin-top: -10%;padding:50px;">Food Menu Overview</h3>
      <table>
          <div class="top-row">
          <tr>
            <td>dash-id</td>
            <td>Dish</td>
            <td>Desc</td>
            <td>Price</td>
            <td>Image</td>
            <td>Edit</td>
            <td>Delete</td>
          </tr>
          </div>
          <?php
          $sql = "SELECT * FROM dish";
          $result = $db->query($sql);
          while($row = mysqli_fetch_assoc($result)){
            echo "<tr>
                  <td>" . $row['dish-id'] . "</td>
                  <td>" . $row['name'] . "</td>
                  <td>" . $row['description'] . "</td>
                  <td>" . $row['price'] . "</td>
                  <td>" . $row['image'] . "</td>";
          }
          ?>
          <tr>
          </tr>
      </table>
    </div>
  </div>
</body>

</html>