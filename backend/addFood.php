<?php
include"./inc/backend_header.php";
require "../inc/env.php";

$query="SELECT * FROM menus";
$response=mysqli_query($dbconnect,$query);
$menus=mysqli_fetch_all($response,1);


?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
   <div class="card mt-5 mx-auto col-lg-10">
        <div class="card-header">
            Add Food item

        </div>
    <div class="card-body">
        <form enctype="multipart/form-data" action="../controller/foodStore.php" method="POST">
            <div class="row">
                <div class="col-lg-4">
                <input name="food_img" type="file" class="form-control imageUpload">
                <?php
                if(isset($_SESSION['errors']['food_img_error'])){
                    ?>

                    <span style="color:red"><?=$_SESSION['errors']['food_img_error']?></span>

                    <?php
                }

                ?>
                <img src="" class="display my-2" width="100%" alt="">
                <!-- img show after setected -->

                </div>

                <div class="col-lg-8">

                <input name="title" type="text" class="form-control" placeholder="title">
                <textarea name="description" id="" cols="30" rows="10" class="form-control my-2" placeholder="description"></textarea>
                <input name="price" type="text" class="form-control my-2" placeholder="Price">
                <select name="menu_id" class="form-control my-2">
                    <option selected disabled>Select a Menu</option>
                    <?php
                    foreach($menus as $key=>$menu){
                        ?>

                        <option value="<?= $menu['id']?>"><?= $menu['name']?></option>
                        <!-- value te dewa menu[id] te giye data save hobe -->

                        <?php
                        }

                    ?>
                </select>
                
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