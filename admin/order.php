<?php
include_once "header.php";
function getFoodName($db, $dishid)
{
  $sqlname = "SELECT * FROM dish WHERE dishid = '$dishid'";
  $result = $db->query($sqlname);
  $row = mysqli_fetch_assoc($result);
  $dishname = $row['name'];
  return $dishname;
}
function getDishPrice($db, $dishid)
{
  $sqlname = "SELECT * FROM dish WHERE dishid = '$dishid'";
  $result = $db->query($sqlname);
  $row = mysqli_fetch_assoc($result);
  $price = $row['price'];
  return $price;
}
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
            <td>User</td>
            <td>Dish</td>
            <td>Qty</td>
            <td>Total Price</td>
            <td>Complete</td>
          </tr>
          </div>
          <?php
          $sql = "SELECT * FROM foodorder";
          $result = $db->query($sql);
          while($row = mysqli_fetch_assoc($result)){
            $totalprice = getDishPrice($db, $row['dishid']) * $row['qty'];
            $dishid = $row['dishid'];
            echo "<form action='order-script.php' method='post'>
                  <tr>
                  <td>" . $row['order-id'] . "</td>
                  <td>" . $_SESSION['nickname'] . "</td>
                  <td>" . getFoodName($db, $dishid) . "</td>
                  <td>" . $row['qty'] . "</td>
                  <td>" . $totalprice . "</td>
                  <td><button type='submit' id='$dishid name='$dishid'>Completed</button></td>
                  </form>";
          }
          ?>
          <tr>
          </tr>
      </table>
    </div>
  </div>
</body>
</html>

<?php

?>