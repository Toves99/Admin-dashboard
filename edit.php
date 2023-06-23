<?php
session_start();
include "config.php";
$id = $_GET["course_id"];
print_r('course id'.$id);
if (isset($_POST["submit"])) {
  $course_name = $_POST['course_name'];
  $course_descrip = $_POST['course_descrip'];
  $moreinfo = $_POST['moreinfo'];
  $course_fee = $_POST['course_fee'];
  $duration = $_POST['duration'];

  $sql = "UPDATE `course` SET `course_name`='$course_name',`course_descrip`='$course_descrip',`moreinfo`='$moreinfo',`course_fee`='$course_fee',`duration`='$duration' WHERE course_id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: users-profile.php?msg=Data updated successfully");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>maw</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color:blue;color white;">
    <span style="color:white;">Maw Institue</span>
  </nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit Course Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php
    
    $sql = "SELECT * FROM `course` WHERE course_id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">Course Name:</label>
            <input type="text" class="form-control" name="course_name" value="<?php echo $row['course_name'] ?>"style="height:50px;">
          </div>

          <div class="col">
            <label class="form-label">Course Fee:</label>
            <input type="text" class="form-control" name="course_fee" value="<?php echo $row['course_fee'] ?>"style="height:50px;">
          </div>
        </div>

        <div class="row mb-3">
          <div class="col">
            <label class="form-label">Duration:</label>
            <input type="text" class="form-control" name="duration" value="<?php echo $row['duration'] ?>"style="height:50px;">
          </div>

          <div class="col">
            <label class="form-label">Course Description:</label>
            <input type="text" class="form-control" name="course_descrip" value="<?php echo $row['course_descrip'] ?>"style="height:50px;">
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">More Information:</label>
          <input type="text" class="form-control" name="moreinfo" value="<?php echo $row['moreinfo'] ?>" style="height:70px;">
        </div>

        <div>
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="users-profile.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>