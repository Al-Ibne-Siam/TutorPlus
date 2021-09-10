<?php
include('connection.php');
if(isset($_POST['user-delete'])){
  session_start();
  $email = $_SESSION['email'];
  $query = "delete from user where email = '$email';";
  mysqli_query($conn, $query);

  echo "<script>window.open('./../index.php','_self') </script>";
  exit();
  
} else {
  echo "<script>window.open('./../index.php','_self') </script>";
  exit();
}
 ?>
