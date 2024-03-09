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
        <form action="new-food.php" method="post">
          <button type="submit" id="submit" name="submit" style='margin-bottom: 40px'>Add New Food</button>
        </form>
        <?php
          if (isset($_GET["error"])) {
            if ($_GET["error"] == "databaseerror") {
                echo "<p style='text-align:center;'> Something went wrong, please try again.</p>";
            }
            if ($_GET["error"] == "none") {
              echo "<p style='text-align:center;'> Food deleted successfully!</p>";
            }
            if ($_GET["error"] == "unfinishedorders") {
              echo "<p style='text-align:center;'> Please complete all orders before deleting this food.</p>";
            } 
          }
        ?>

        <table>
          <div class="top-row">
            <tr>
              <td>dish-id</td>
              <td>Dish</td>
              <td>Desc</td>
              <td>Price</td>
              <td>Delete</td>
            </tr>
          </div>
          <?php
          $sql = "SELECT * FROM dish";
          $result = $db->query($sql);
          while ($row = mysqli_fetch_assoc($result)) {
            $dishid = $row['dishid'];
            echo "<tr>
                  <td>" . $row['dishid'] . "</td>
                  <td>" . $row['name'] . "</td>
                  <td>" . $row['description'] . "</td>
                  <td>" . $row['price'] . "</td>
                  <td><a href='menu-script.php?dish=$dishid'> Delete </a></td>";
          }
          ?>
          <tr>
          </tr>
        </table>
    </div>
  </div>
</body>

</html>