<?php 
// session start
session_start();
// include header
include('./extends/header.php');
// include database
include('../config/db.php');

?>

<div class="container">
  <div class="row">
    <div class="col">
      <div class="page-description">
        <h1 class="fw-bold fs-1 text-dark">Brand_Insert<span class="text-success">(✍🏻)</span></h1>
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
          <h3 class="">Brand Image</h3>
          </div>
          <div class="card-body">
            <form action="brand_post.php" method="POST" enctype="multipart/form-data">
            <input type="file" class="form-control" name="image">
            <button class="btn btn-primary mt-3" name="insert_img">Insert</button>
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