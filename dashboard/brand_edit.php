<?php 
// include header
include('./extends/header.php');
// include database
include('../config/db.php');


// brand get information from database btn id name brand_edit

$id = $_GET['brand_edit'];

$select_query = "SELECT * FROM brands WHERE id='$id'";

$connect = mysqli_query($db_connect,$select_query);
$brand = mysqli_fetch_assoc($connect);




?>

<div class="container">
  <div class="row">
    <div class="col">
      <div class="page-description">
        <h1 class="fw-bold fs-1 text-dark">Brand Image Update<span class="text-success">(📸)</span></h1>
      </div>
    </div>
  </div>
</div>

<!-- brand insert area -->


<div class="container">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h3 class="">Choose Image📸</h3>
          </div>
          <div class="card-body">
            <form action="brand_post.php" method="POST" enctype="multipart/form-data">
            <span class="text-danger fw-bold">Your Old Image-> <img style="width: 60px;height:60px; border: 2px solid #f1c40f; border-radius: 5px;margin-bottom: 5px;" src="../images/brand/<?= $brand['image'] ?>" alt="all_image"></span>

            <!-- <input type="file" class="form-control" name="image" value=""> -->
            <input class="form-control" type="file" name="image">
            <input type="hidden" value="<?= $brand['id'] ?>" name="brand_id">
            <button type="submit" class="btn btn-primary mt-3" name="update_img">Update</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>




<!-- image error message -->

<?php if(isset($_SESSION['img_error'] )) : ?>

<script>
const factError = Swal.mixin({
 toast: true,
 position: "top-end",
 showConfirmButton: false,
 timer: 3000,
 timerProgressBar: true,
 didOpen: (toast) => {
   toast.onmouseenter = Swal.stopTimer;
   toast.onmouseleave = Swal.resumeTimer;
 }
});
factError.fire({
 icon: "error",
 title: "<?= $_SESSION['img_error'] ?>",
 color: 'red' ,
 position: 'top-end',
 background: '#fff',
});
</script>
<?php endif;unset($_SESSION['img_error']); ?>






<?php
// include footer
include('./extends/footer.php');
?>