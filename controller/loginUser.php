<?php
session_start();
include"../inc/env.php";

$email=$_REQUEST['email'];
$password=$_REQUEST['pass'];
$query="SELECT * FROM users WHERE email='$email'";
$response=mysqli_query($dbconnect, $query);
$user=mysqli_fetch_assoc($response);

if(empty($email)){
       $_SESSION['email_error']="Plz type your email";
}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $_SESSION['email_error']= 'INVALID!! Enter a valid email';
}elseif($response->num_rows<1){
    $_SESSION['email_error']= 'SORRY!! email not exist';
}

if(empty($password)){
        $_SESSION['pass_error']="Plz type your Password";
}

if(count($_SESSION)>0){
    $_SESSION['old']=$_REQUEST;
    header("Location: ../login.php");
}else{
    if(password_verify($password, $user['password'])){
        $_SESSION['auth']=$user;
        header("Location: ../backend/dashboard.php");
        }
    else{
        $_SESSION['old']=$_REQUEST;
            $_SESSION['pass_error']="WRONG PASS!! enter valid password";
            header("Location: ../login.php");
    }
}
?>