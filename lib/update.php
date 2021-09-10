<?php
include("connection.php");

if(isset($_POST['CV_update'])){
  session_start();
  $curriculum = $_POST['curriculum'];
  $background = $_POST['background'];
  $aboutme = $_POST['aboutme'];
  $email = $_SESSION['email'];

  $_SESSION['curriculum'] = $curriculum;
  $_SESSION['background'] = $background;
  $_SESSION['about_me'] = $aboutme;

  $query = "update tutor set curriculum = '$curriculum', background = '$background', about_me = '$aboutme' where user_email = '$email';";
  mysqli_query($conn, $query);

  $_SESSION['curriculum'] = $curriculum;
  $_SESSION['background'] = $background;
  $_SESSION['about_me'] = $aboutme;

  echo "<script>window.open('./../tutor.php','_self') </script>";
  exit();

}else {
  echo "<script>window.open('./../user-registration-form.php','_self') </script>";
  exit();
}
?>
