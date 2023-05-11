<?php
session_start();
include "../inc/env.php";

$name=$_REQUEST['name'];
$phone=$_REQUEST['phone'];
$email=$_REQUEST['email'];
$password=$_REQUEST['pass'];
$enc_password=password_hash($password, PASSWORD_BCRYPT); //password encrypted kore
$con_password=$_REQUEST['con_pass'];

$errors=[];

if(!empty($name)){
    //echo "Plz write your Name";
    //$errors['name_error']= 'Plz write your Name';
    if(strlen($name) <=2){
        $errors['name_error']= 'type name minimum 3 char';
    }elseif(strlen($name) >=21){
        $errors['name_error']= 'type name maximum 20 char';
    }
}

if(empty($phone)){
    $errors['phone_error']= 'need to call, give number';
}elseif(strlen($phone) !=11){
    $errors['phone_error']= 'INVALID!!,number must be 11 digit';
}

//if email id exists
$query="SELECT * FROM users WHERE email='$email'";
$response=mysqli_query($dbconnect, $query);

if(empty($email)){
    $errors['email_error']= 'enter email id';
}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors['email_error']= 'INVALID!! Enter a valid email';
}elseif($response-> num_rows > 0){
    $errors['email_error']= 'SORRY!! This email already Exist';
}

if(empty($password)){
    $errors['pass_error']= 'plz, Give a password';
}elseif(strlen($password) < 6){
    $errors['pass_error']= 'error!! too short paasword';
}elseif(strlen($password) > 8){
    $errors['pass_error']= 'error!! too long paasword';   
}

if(empty($con_password)){
    $errors['con_pass_error']= 'plz, Retype your password';
}elseif($con_password!=$password){
    $errors['con_pass_error']= 'Opps!! password not MATCHED!!';
}

if(count($errors)>0){
    $_SESSION['form_error']=$errors;
    $_SESSION['old']=$_REQUEST;
    header("Location: ../register.php");
}

else{
    $query= "INSERT INTO users(name, phone, email, password) 
    VALUES ('$name', '$phone', '$email', '$enc_password')";
    
    $response=mysqli_query($dbconnect, $query);

    if($response){
        header("Location: ../login.php");
    }
}

?>