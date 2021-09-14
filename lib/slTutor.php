<?php
  include('connection.php');
  session_start();
  $tutor_email = $_GET['t_email'];
  $student_email = $_SESSION['email'];
  $check = "select *
            from tutor_shortlist
            where tutor_email = '$tutor_email' and student_email = '$student_email'; ";
  $exist = mysqli_query($conn, $check);
  if(mysqli_num_rows($exist)==0){
    $query = "insert into tutor_shortlist(tutor_email,student_email)
              VALUE('$tutor_email','$student_email');";
    mysqli_query($conn, $query);
    echo "<script>alert('Tuitor succesfully shortlisted.')</script>";
  } else {
    echo "<script>alert('You have already shortlisted this tutor')</script>";
  }

  echo "<script>window.open('./../student.php','_self') </script>";
  exit();
 ?>
