<?php
include"./inc/backend_header.php";
require "../inc/env.php";

$query= "SELECT * FROM banners";
$response= mysqli_query($dbconnect, $query);
$banners= mysqli_fetch_all($response,1);
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<h2>All Banners list</h2>

<table class="table table-resposive">
    <tr>
        <th>S.No</th>
        <th>Banner Title</th>
        <th>Description</th>
        <th>Image</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    <?php
foreach($banners as $key=>$banner){
    ?>
    <tr>
        <td>
            <?=++$key?>
        </td>
        <td>
            <?=$banner['title']?>
        </td>
        <td>
            <?=strlen($banner['description'])>20 ? substr($banner['description'], 0,20) . '......' : $banner['description']?>
        </td>
        <td>
            <img width="150px" src="<?="../uploads/" . $banner['banner_img']?>" alt="">
        </td>
        <td>
            <span class="btn btn-sm btn-<?=$banner['status']==1 ? 'success' : 'danger' ?>"><?=$banner['status']==1 ? 'Active' : 'Deactive' ?></span>
            <!-- IMPORTANT button rules and conditions -->
        </td>
        <td>
            <a href="../controller/bannerStatus.php?id=<?= $banner['id'] ?>" class="btn btn-warning">
                <?=$banner['status']==1 ? 'Deactive' : 'Active' ?>
            </a>
            <a href="./editBanner.php?id=<?=$banner['id']?>" class="btn btn-primary">Edit</a>
            <a href="" class="btn btn-success">View</a>
            <a href="../controller/bannerDelete.php?id=<?= $banner['id']?>" class="btn btn-danger deleteBtn">Delete</a>
        </td>
    </tr>
    <?php
}

    ?>
    

    

</table>
    
</main>

<!-- jQuery file link CDN -->
<script
  src="https://code.jquery.com/jquery-3.6.4.min.js"
  integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <script>
    $(function(){
        let deleteBtn= $('.deleteBtn')
        deleteBtn.click(function(event){
            event.preventDefault()
                Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href=$(this).attr('href')
                }
                })

        })
        

    })
  </script>


<?php
include"./inc/backend_footer.php";
?>