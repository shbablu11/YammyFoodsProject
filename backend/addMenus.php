<?php
include"./inc/backend_header.php";
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
   <div class="card mt-5 mx-auto col-lg-10">
    <div class="card-header">
    Add new Menu

    </div>
    <div class="card-body">
        <form enctype="multipart/form-data" action="../controller/menuStore.php" method="POST">
            
        <input name="name" type="text" class="form-control mb-2" placeholder="Menu name">
            <button class="btn-primary btn w-100">Submit</button>
        </form>

    </div>

   </div>
    
</main>


<?php
include"./inc/backend_footer.php";
unset($_SESSION['errors']);
?>
