<?php
// include header
include('./extends/header.php');
// icons include
include('./extends/icons.php');


?>

<div class="container">
<div class="row">
  <div class="col">
    <div class="page-description">
      <h1 class="fw-bold fs-1 text-primary">Portfolio_Insert<span class="text-warning">(✍🏻)</span></h1>
    </div>
  </div>
</div>
</div>


<!-- portfolio insert  -->

<div class="container">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <form action="portfolio_post.php" method="POST" enctype="multipart/form-data">
          <label for="title">Title</label>
          <textarea class="form-control" name="title"></textarea>
          <label for="description">Description</label>
          <textarea class="form-control" name="description"></textarea>
          <label for="image" class="mt-2">Choose your Image</label>
          <input type="file" class="form-control" name="image">
          <button class="btn btn-primary mt-4" type="submit" name="insert_btn">Insert</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- sweet alret -->

<?php if(isset($_SESSION['erro_msg'] )) : ?>

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
 title: "<?= $_SESSION['erro_msg'] ?>",
 color: 'red' ,
 position: 'top-end',
 background: '#fff',
});
</script>
<?php endif;unset($_SESSION['erro_msg']); ?>




<?php
// include footer
include('./extends/footer.php');

?>