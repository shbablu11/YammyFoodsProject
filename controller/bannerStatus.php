<?php
require "../inc/env.php";


$id=$_REQUEST['id'];
//$query="SELECT * from banners WHERE id='$id'"; //all dile loading beshi hoi
//$query="SELECT status from banners WHERE id='$id'"; //only status tule anar jnno,(fast loading)

//$response=mysqli_query($dbconnect,$query);
//$banner=mysqli_fetch_assoc($response['status']); //jokon SELECT * (all) tula hoi
//$banner=mysqli_fetch_assoc($response);

// if($banner['status']==1){
//     $query="UPDATE banners SET status='0' WHERE id='$id'";

// }else{
//     $query="UPDATE banners SET status='1' WHERE id='$id'";
// }

// $response=mysqli_query($dbconnect,$query);
// if($response){
//     header("Location: ../backend/allBanners.php");
// }


$query= "UPDATE banners SET status='0'"; //sob gulu deactivate kore dei
$response=mysqli_query($dbconnect,$query);

$query= "UPDATE banners SET status='1' WHERE id='$id'"; //jei ta click kora hoi, only oitai Active hobe
$response=mysqli_query($dbconnect,$query);
if($response){
    header("Location: ../backend/allBanners.php");
}



?>