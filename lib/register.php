<?php
  include("connection.php");

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $password =  $_POST['password'];
  $pnum = $_POST['pnum'];
  $gender = $_POST['gender'];

  if(isset($_POST['register'])){

    $check_email_query = "select * from user where email = '$email'";
    $run_query = mysqli_query($conn, $check_email_query);

    if(mysqli_num_rows($run_query) > 0) {
      echo "<script> alert('User already exists. Try a new email') </script>";
      echo "<script>window.open('../user-registration-form.php') </script>";
      exit();
    } else {
      $insert_user = "insert into user(fname, lname, email, password, phone_num, gender)
      value('$fname','$lname','$email','$password','$pnum','$gender');";
      mysqli_query($conn, $insert_user);
    }

  } else {
    echo "<script>window.open('../user-registration-form.php') </script>";
    exit();
  }

 ?>
