<?php
session_start();
require "../inc/env.php";

$title=$_REQUEST['title'];
$description=$_REQUEST['description'];
$cta=$_REQUEST['cta'];
$cta_url=$_REQUEST['cta_url'];
$video_url=$_REQUEST['video_url'];
$banner_img=$_FILES['banner_img'];

$extension_type=['jpg','png','webp'];
$extension=pathinfo($banner_img['name'], PATHINFO_EXTENSION);

$errors=[];

if($banner_img['size']==0){
    $errors['banner_img_error']="Plz upload an image file";
}elseif($banner_img['size']>5000000){
    $errors['banner_img_error']="Sorry!! maximum size is 500kb";
}elseif(!in_array($extension, $extension_type)){
    $errors['banner_img_error']="invalid file!! only support (jpg,png,webp) format";
}

if(count($errors)>0){
    $_SESSION['errors']=$errors;
    header("Location: ../backend/banner.php");

}else{
    //unique name
    $newName="Banner" . '-' . uniqid() . '.' . $extension;
    $path= "../uploads";
    if(!file_exists($path)){
        mkdir($path);
    }
    //upload in database
    $uplodedFile=move_uploaded_file($banner_img['tmp_name'], "../uploads/$newName");
    if($uplodedFile){
        $query= "INSERT INTO banners(title, description, cta, cta_url, video_url, banner_img) 
        VALUES ('$title','$description','$cta','$cta_url','$video_url','$newName')";

        $response= mysqli_query($dbconnect, $query);
        

        if($response){
            header("location: ../backend/allBanners.php");

        }
    }
}



?>