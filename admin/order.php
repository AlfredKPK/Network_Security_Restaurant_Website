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
      <h1 style="text-align:center;margin-top: -10%;padding:50px;">Order Overview</h3>
      <table>
          <div class="top-row">
          <tr>
            <td>Order-id</td>
            <td>login-id</td>
            <td>dish-id</td>
            <td>Qty</td>
            <td>Edit</td>
            <td>Delete</td>
          </tr>
          </div>
          <?php
          $sql = "SELECT * FROM order";
          $result = $db->query($sql);
          while($row = mysqli_fetch_assoc($result)){
            echo "<tr>
                  <td>" . $row['order-id'] . "</td>
                  <td>" . $row['login-id'] . "</td>
                  <td>" . $row['dish-id'] . "</td>
                  <td>" . $row['qty'] . "</td>";
          }
          ?>
          <tr>
          </tr>
      </table>
    </div>
  </div>
</body>

</html>