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
?>
