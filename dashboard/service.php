<?php
// include header
include('./extends/header.php');
include('../config/db.php');

$select_query = "SELECT * FROM services";
$services = mysqli_query($db_connect,$select_query);

// serial maintain for table 

$serial = 1 ;

?>

<div class="container">
<div class="row">
  <div class="col">
    <div class="page-description">
      <h1 class="fw-bold fs-1 text-warning">Services<span class="text-success">(📝)</span></h1>
    </div>
  </div>
</div>
</div>

<div class="container">
<div class="card">
  <div class="card-body">
  <table class="table table-dark ">
  <thead class="text-white">
    <tr>
      <th  scope="col">ID</th>
      <th  scope="col">Icon</th>
      <th  scope="col">Title</th>
      <th  scope="col">Description</th>
      <th  scope="col">Status</th>
      <th  scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($services as $service) : ?>
    <tr>
      <td><?= $serial++ ?></td>
      <td><i class="<?= $service['icon'] ?>"></i></td>
      <td><?= $service['title'] ?></td>
      <td><?= $service['description'] ?></td>
      <td>
      <?php if($service['status'] == 'active') : ?>
      <a href="service_post.php?change_status=<?= $service['id'] ?>" class="badge bg-success">active</a>
      <?php else: ?>
      <a href="service_post.php?change_status=<?= $service['id'] ?>" class="badge bg-danger">deactive</a>
      <?php endif; ?>
      </td>
      <td>
        <a class="btn btn-primary" href="service_edit.php?edit_id=<?= $service['id'] ?>">Edit</a>
        
        <a class="btn btn-danger" href="service_post.php?delete_id=<?= $service['id'] ?>">Delet</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
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
 background: '#fff',
});
</script>
<?php endif;unset($_SESSION['insert_success']); ?>

<!-- insert error msg -->

<?php if(isset($_SESSION['insert_error'] )) : ?>

<script>
const erroMsg = Swal.mixin({
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
erroMsg.fire({
 icon: "error",
 title: "<?= $_SESSION['insert_error'] ?>",
 color: 'red' ,
 position: 'top-end',
 background: '#fff',
});
</script>
<?php endif;unset($_SESSION['insert_error']); ?>


<!-- delet Successfully -->

<?php if(isset($_SESSION['delet_msg'] )) : ?>

<script>
const deletMsg = Swal.mixin({
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
deletMsg.fire({
 icon: "error",
 title: "<?= $_SESSION['delet_msg'] ?>",
 color: 'red' ,
 position: 'top-end',
 background: '#fff',
});
</script>
<?php endif;unset($_SESSION['delet_msg']); ?>







<?php
// include footer
include('./extends/footer.php');

?>