<?php
// include header
include('./extends/header.php');
//select all data from database testimonials
include('../config/db.php');

$id = $_GET['edit_id'];
// select query for data fetch
$select_query = "SELECT * FROM testimonials WHERE id='$id'";
$connect = mysqli_query($db_connect,$select_query);
$tests = mysqli_fetch_assoc($connect);

?>

<div class="container">
<div class="row">
  <div class="col">
    <div class="page-description">
      <h1 class="fw-bold fs-1 text-warning">Edit_Testimonial<span class="text-warning">(✍🏻)</span></h1>
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
          <textarea name="name" class="form-control"><?= $tests['name'] ?></textarea>
          <!-- title -->
          <label for="form-control">Title</label>
          <textarea name="title" class="form-control"><?= $tests['title'] ?></textarea>
          <!-- description -->
          <label for="form-control">Description</label>
          <textarea name="description" class="form-control">
          <?= $tests['description'] ?>
          </textarea>
          <!-- image  -->
           <div class="mt-1 mb-1">
            <span class="text-danger fw-bold fs-6">Your Old Image*</span>
           <img style="width: 50px;height:50px; border: 1px solid #262626; border-radius: 5px;" src="../images/testimonial/<?= $tests['image'] ?>" alt="">
           </div>
           <input type="file" class="form-control mt-3 mb-3" name="image">
           <input type="hidden" value="<?= $tests['id'] ?>"  name="edit_id">
           <!-- button area -->
            <button type="submit" class="btn btn-warning" name="edit_btn">Update</button>
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