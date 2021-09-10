<?php
  include('connection.php');
  session_start();
  $studen_email = $_GET['s_email'];
  $tutor_email = $_SESSION['email'];
  $check = "select *
            from student_shortlist
            where tutor_email = '$tutor_email' and student_email = '$studen_email'; ";
  $exist = mysqli_query($conn, $check);
  if(mysqli_num_rows($exist)==0){
    $query = "insert into student_shortlist(tutor_email,student_email)
              VALUE('$tutor_email','$studen_email');";
    mysqli_query($conn, $query);
    echo "<script>alert('Student succesfully shortlisted.')</script>";
  } else {
    echo "<script>alert('You have already shortlisted this student')</script>";
  }

  echo "<script>window.open('./../tutor.php','_self') </script>";
  exit();
 ?>
