<?php
// include header
include('./extends/header.php');

?>

<div class="container">
<div class="row">
  <div class="col">
    <div class="page-description">
      <h1 class="fw-bold fs-1 text-warning">Testimonial_Insert<span class="text-warning">(✍🏻)</span></h1>
    </div>
  </div>
</div>
</div>


<!-- testimonial data insert -->

<div class="container">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <form action="testimonial_post.php" method="POST" enctype="multipart/form-data">
          <label for="form-control">Name</label>
          <textarea name="name" class="form-control"></textarea>
          <!-- title -->
          <label for="form-control">Title</label>
          <textarea name="title" class="form-control"></textarea>
          <!-- description -->
          <label for="form-control">Description</label>
          <textarea name="description" class="form-control"></textarea>
          <!-- image  -->
           <input type="file" class="form-control mt-3 mb-3" name="image">
           <!-- button area -->
            <button type="submit" class="btn btn-primary" name="insert_btn">Insert</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- sweet msg -->

<?php if (isset($_SESSION['insert_error'])) : ?>

<script>
  const regDone = Swal.mixin({
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
  regDone.fire({
    icon: "error",
    title: "<?= $_SESSION['insert_error'] ?>",
    color: 'red',
    position: 'top-end',
    background: '#ffeaa7',
  });
</script>
<?php endif;
unset($_SESSION['insert_error']); ?>


<?php
// include footer
include('./extends/footer.php');
?>