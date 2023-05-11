<?php
require "../inc/env.php";


$title=$_REQUEST['title'];
$description=$_REQUEST['description'];
$cta=$_REQUEST['cta'];
$cta_url=$_REQUEST['cta_url'];
$video_url=$_REQUEST['video_url'];
$banner_img=$_FILES['banner_img'];
$id=$_REQUEST['id'];


if($banner_img['size']>0){
    //image update, if user select new image
    $query="SELECT banner_img FROM banners WHERE id='$id'";
    $response=mysqli_query($dbconnect,$query);
    $banner=mysqli_fetch_assoc($response); //old image tule anar jnno
    $path="../uploads/". $banner['banner_img'];

    //banner file exists
    if(file_exists($path)){
        unlink($path);
    }
    //new selected image progress
    $extension=pathinfo($banner_img['name'], PATHINFO_EXTENSION);
    $newName="Banner" . '-' . uniqid() . '.' . $extension;
    $uplodedFile=move_uploaded_file($banner_img['tmp_name'], "../uploads/$newName");

    //update in database
    $query="UPDATE banners SET title='$title',
    description='$description',cta='$cta',cta_url='$cta_url',video_url='$video_url',banner_img='$newName' WHERE id='$id'";

    $response= mysqli_query($dbconnect, $query);
    if($response){
        header("location: ../backend/allBanners.php");
    }
    
}else{//pic jodi new select na kore, ager tai rakle
    $query="UPDATE banners SET title='$title',
    description='$description',cta='$cta',cta_url='$cta_url',video_url='$video_url' WHERE id='$id'";

    $response= mysqli_query($dbconnect, $query);
    if($response){
        header("location: ../backend/allBanners.php");
    }
}


?>