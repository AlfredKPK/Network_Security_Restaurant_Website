<?php
if (isset($_POST["submit"])) {
  $sql = "DELETE FROM foodorder WHERE id=$";

  if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $conn->error;
  }
  exit();
} else {
  header("location: ../index.php");
  exit();
}
