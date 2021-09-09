<?php
  include("connection.php");

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $password =  sha1($_POST['password']);
  $pnum = $_POST['pnum'];
  $gender = $_POST['gender'];
  $usertype = $_POST['usertype'];

  echo $usertype;

  if(isset($_POST['register'])){

    $check_email_query = "select * from user where email = '$email'";
    $run_query = mysqli_query($conn, $check_email_query);

    if(mysqli_num_rows($run_query) > 0) {
      echo "<script> alert('User already exists. Try a new email') </script>";
      echo "<script>window.open('./../user-registration-form.php','_self') </script>";
      exit();
    } else {
      $insert_user = "insert into user(fname, lname, email, password, pnum, gender)
      value('$fname','$lname','$email','$password','$pnum','$gender');";
      mysqli_query($conn, $insert_user);

      if($usertype == '1'){
        $insert_tutor = "insert into tutor(user_email)
        value('$email');";
        mysqli_query($conn, $insert_tutor);
        session_start();
        $_SESSION['email'] = $email;
        echo "<script>window.open('./../tutor.php','_self') </script>";
        exit();

      } else if($usertype == '2'){
        $insert_student = "insert into student(user_email)
        value('$email');";
        mysqli_query($conn, $insert_student);
        session_start();
        $_SESSION['email'] = $email;
        echo "<script>window.open('./../student.php','_self') </script>";
        exit();
      }
    }

  } else {
    echo "<script>window.open('./../user-registration-form.php','_self') </script>";
    exit();
  }

 ?>
