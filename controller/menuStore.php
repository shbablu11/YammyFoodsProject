<?php
require "../inc/env.php";

$name=$_REQUEST['name'];

$query="INSERT INTO menus(name) VALUES ('$name')";
$response=mysqli_query($dbconnect,$query);
if($response){
    header("Location: ../backend/addMenus.php");
}




?>