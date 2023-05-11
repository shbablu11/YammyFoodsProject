<?php
require "../inc/env.php";

$id=$_REQUEST['id'];

//selected id er server thekeo image delete korar jnno
$query="SELECT banner_img FROM banners WHERE id='$id'";
$response=mysqli_query($dbconnect,$query);
$banner=mysqli_fetch_assoc($response); //old image tule anar jnno
$path="../uploads/". $banner['banner_img'];

//banner file exists
if(file_exists($path)){
    unlink($path);
}
//selected Banner delete hoiye jabe
$query="DELETE FROM banners WHERE id='$id'";
$response=mysqli_query($dbconnect,$query);
if($response){
    header("Location: ../backend/allBanners.php");
}



?>