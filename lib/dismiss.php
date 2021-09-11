<?php
if(isset($_POST['dismissal-button']))
{
  include('connection.php');
  session_start();
  $studen_email = $_GET['s_email'];
  $tutor_email = $_SESSION['email'];

    $query = "delete from tutor_shortlist where tutor_email = '$tutor_email' and student_email = '$studen_email';";
    mysqli_query($conn, $query);
    echo "<script>alert('Match dismissed succesfully.')</script>";

  echo "<script>window.open('./../tutor.php','_self') </script>";
  exit();
}else {
  echo "<script>window.open('./../index.php','_self') </script>";
  exit();
}
 ?>
