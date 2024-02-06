<?php
include_once "../admin/header.php";
?>

<!DOCTYPE html>
<html>

<head>
  <title>Account Management</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../images/background.jpg">
  <link href="../css/style.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php
  include_once "../config.php";
  ?>
</head>

<body>
  <div class="largescreen">
    <div class="admin-view">
      <h1 style="text-align:center;margin-top: -10%;padding:50px;">Account Overview</h3>
      <table>
          <div class="top-row">
          <tr>
            <td>Login-id</td>
            <td>Nickname</td>
            <td>Email</td>
            <td>Roles</td>
            <td>Edit</td>
            <td>Delete</td>
          </tr>
          </div>
          <?php
          $sql = "SELECT * FROM users";
          $result = $db->query($sql);
          while($row = mysqli_fetch_assoc($result)){
            echo "<tr>
                  <td>" . $row['login-id'] . "</td>
                  <td>" . $row['nickname'] . "</td>
                  <td>" . $row['email'] . "</td>
                  <td>" . $row['roles'] . "</td>";
          }
          ?>
          <tr>
          </tr>
      </table>
    </div>
  </div>
</body>

</html>