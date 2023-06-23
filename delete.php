<?php
include "config.php";
$id = $_GET["course_id"];
$sql = "DELETE FROM `course` WHERE course_id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: users-profile.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}
