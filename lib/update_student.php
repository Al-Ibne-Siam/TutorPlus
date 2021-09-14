<?php
include("connection.php");

if (isset($_POST['student_info_update'])) {
  session_start();
  $institution = $_POST['institution'];
  $background = $_POST['background'];
  $curriculum = $_POST['curriculum'];
  $aboutme = $_POST['aboutme'];
  $min_fees = $_POST['min_fees'];
  $max_fees = $_POST['max_fees'];
  $location = $_POST['location'];
  $email = $_SESSION['email'];

  $_SESSION['curriculum'] = $curriculum;
  $_SESSION['min_fees'] = $min_fees;
  $_SESSION['max_fees'] = $max_fees;

  $query = "update student set institution = '$institution', curriculum = '$curriculum', background = '$background', more_info = '$aboutme', min_fees = '$min_fees', max_fees = '$max_fees', location = '$location' where user_email = '$email';";
  mysqli_query($conn, $query);

  $_SESSION['curriculum'] = $curriculum;
  $_SESSION['min_fees'] = $min_fees;
  $_SESSION['max_fees'] = $max_fees;

  echo "<script>window.open('./../student.php','_self') </script>";
  exit();
}

else {
  echo "<script>window.open('./../user-registration-form.php','_self') </script>";
  exit();
}

?>
