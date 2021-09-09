<?php
require_once("connection.php");

if(isset($_POST['sublogin'])){
$login = $_POST['login_var'];
$password = $_POST['password'];
$query = "select * from user where ( uname='$login' OR email = '$login')";
$res = mysqli_query($conn,$query);
$numRows = mysqli_num_rows($res);
if($numRows  == 1){
        $row = mysqli_fetch_assoc($res);
        if(password_verify($password,$row['password'])){
           echo "<script>alert('Login Successful')</script>";
        }
        else{
     header("location:login-form.php?loginerror=".$login);
        }
    }
    else{
  header("location:login-form.php?loginerror=".$login);
    }
}

if(isset($_POST['login'])){
$login = $_POST['email'];
$password = sha1($_POST['password']);

$check = "select * from user where email = '$login' and password = '$password';";
$query = mysqli_query($conn, $check);

if(mysqli_num_rows($query) == 1){

    $user_check = "select * from tutor where user_email = '$login';";
    $userQuery = mysqli_query($conn, $user_check);

    if(mysqli_num_rows($userQuery) == 1) {
      session_start();
      $_SESSION['email'] = $login;
      echo "<script>window.open('./../tutor.php','_self') </script>";
      exit();

    } else {
      session_start();
      $_SESSION['email'] = $login;
      echo "<script>window.open('./../student.php','_self') </script>";
      exit();
    }
  }else{
    echo "<script>alert('Email or password is incorrect!')</script>";
    echo "<script>window.open('./../index.php','_self')</script>";
    exit();
  }
}

?>
