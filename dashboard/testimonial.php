<?php
// include header
include('./extends/header.php');
//session start
// include db
include('../config/db.php');

// select all item of testimonials

$select_query = "SELECT * FROM testimonials";
$tests = mysqli_query($db_connect,$select_query);

$serial = 1 ;

?>


<div class="container">
<div class="row">
  <div class="col">
    <div class="page-description">
      <h1 class="fw-bold fs-1 text-primary">Testimonial_Data<span class="text-warning">(✍🏻)</span></h1>
    </div>
  </div>
</div>
</div>


<!-- testimonials table area -->

<div class="container-fluid">
  <div class="col">
    <div class="card bg-dark">
      <div class="card-body">
      <table class="table table-warning">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Image</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($tests as $test) : ?>
    <tr>
      <td><?= $serial++ ?></td>
      <td><?= $test['name'] ?></td>
      <td><?= $test['title'] ?></td>
      <td><?= $test['description'] ?></td>
      <td>
      <img style="width: 30px;height:30px; border: 1px solid #fff; border-radius: 5px;" src="../images/testimonial/<?= $test['image'] ?>" alt="">
      </td>
      <td>
        <?php if($test['status'] == 'active') : ?>
        <a class="badge btn-success" href="testimonial_post.php?change_status=<?= $test['id'] ?>">active</a>
        <?php else : ?>
        <a class="badge btn-danger" href="testimonial_post.php?change_status=<?= $test['id'] ?>">deactive</a>
        <?php endif; ?>
      </td>
      <td>
        <a class="btn btn-primary" href="testimonial_edit.php?edit_id=<?= $test['id'] ?>">Edit</a>
        <a class="btn btn-danger" href="testimonial_post.php?delet_id=<?= $test['id'] ?>">Delete</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
      </div>
    </div>
  </div>
</div>



<!-- sweet alret -->

<?php if(isset($_SESSION['insert_success'] )) : ?>

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
 icon: "success",
 title: "<?= $_SESSION['insert_success'] ?>",
 color: 'green' ,
 position: 'top-end',
 background: '#dfe6e9',
});
</script>
<?php endif;unset($_SESSION['insert_success']); ?>



<?php
// include footer
include('./extends/footer.php');

?>