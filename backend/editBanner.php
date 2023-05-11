<?php
include"./inc/backend_header.php";
require "../inc/env.php";

$id=$_REQUEST['id'];
$query="SELECT * FROM banners WHERE id='$id'";
$response=mysqli_query($dbconnect,$query);
$banner=mysqli_fetch_assoc($response);



?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
   <div class="card mt-5 mx-auto col-lg-10">
    <div class="card-header">
        Edit your Banner

    </div>
    <div class="card-body">
        <form enctype="multipart/form-data" action="../controller/bannerUpdate.php" method="POST">
            <input type="hidden" name="id" value="<?= $id?>"> 
            <!-- id pass korar jnno hidden input -->
            <div class="row">
                <div class="col-lg-4">
                <input name="banner_img" type="file" class="form-control imageUpload">
                <?php
                if(isset($_SESSION['errors']['banner_img_error'])){
                    ?>

                    <span style="color:red"><?=$_SESSION['errors']['banner_img_error']?></span>

                    <?php
                }

                ?>
                <img src="../uploads/<?= $banner['banner_img']?>" class="display my-2" width="100%" alt="">
                <!-- img show after setected -->

                </div>

                <div class="col-lg-8">

                <input name="title" type="text" class="form-control" placeholder="title" value="<?= $banner['title']?>">
                <textarea name="description" id="" cols="30" rows="10" class="form-control my-2" placeholder="description"><?= $banner['description']?></textarea>
                <input name="cta" type="text" class="form-control my-2" placeholder="call to action" value="<?= $banner['cta']?>">
                <input name="cta_url" type="text" class="form-control my-2" placeholder="call to action URL" value="<?= $banner['cta_url']?>">
                <input name="video_url" type="text" class="form-control my-2" placeholder="intro video URL" value="<?= $banner['video_url']?>">

                </div>
            </div>

            <button class="btn-primary btn w-100">Submit</button>
        </form>

    </div>

   </div>
    
</main>


<?php
include"./inc/backend_footer.php";
unset($_SESSION['errors']);
?>