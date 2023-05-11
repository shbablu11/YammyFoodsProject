<?php
require "../inc/env.php";

$title=$_REQUEST['title'];
$description=$_REQUEST['description'];
$price=$_REQUEST['price'];
$food_img=$_FILES['food_img'];
$menu_id=$_REQUEST['menu_id'];

$extension_type=['jpg','png','webp'];
$extension=pathinfo($food_img['name'], PATHINFO_EXTENSION);

$newName="Food" . '-' . uniqid() . '.' . $extension; //new file name for image
$uplodedFile=move_uploaded_file($food_img['tmp_name'], "../uploads/$newName"); //upload to database from tmp name(location)

if($uplodedFile){
    $query="INSERT INTO foods(title, description, price, food_img, menu_id) 
                    VALUES ('$title','$description','$price','$newName','$menu_id')";
    $response= mysqli_query($dbconnect, $query);
    if($response){
        header("location: ../backend/addFood.php");

    }


}





?>