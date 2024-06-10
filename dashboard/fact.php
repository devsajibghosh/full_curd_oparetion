<?php
// include header
include('./extends/header.php');
// include database
include('../config/db.php');

// select all data from facts table
$select_query = "SELECT * FROM facts";
$facts = mysqli_query($db_connect,$select_query);

$serial = 1 ;

?>

<div class="container">
<div class="row">
  <div class="col">
    <div class="page-description">
      <h1 class="fw-bold fs-1 text-warning">Fact<span class="text-success">(📝)</span></h1>
    </div>
  </div>
</div>
</div>

<!-- table of facts -->

<div class="container">
  <div class="card bg-dark">
    <div class="card-body">
    <table class="table table-dark">
  <thead>
  <tr>
      <th  scope="col">#ID</th>
      <th  scope="col">Number</th>
      <th  scope="col">Icon</th>
      <th  scope="col">Description</th>
      <th  scope="col">Status</th>
      <th  scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($facts as $fact) : ?>
    <tr>
      <td><?= $serial++ ?></td>
      <td><?= $fact['number'] ?></td>
      <td><i class="<?= $fact['icon'] ?>"></i></td>
      <td><?= $fact['description'] ?></td>
      <td>
        <?php if($fact['status'] == 'active') : ?>
        <a href="fact_post.php?change_status=<?= $fact ['id']?>" class="badge btn-success">active</a>
        <?php else: ?>
        <a href="fact_post.php?change_status=<?= $fact ['id']?>" class="badge btn-danger">deactive</a>
        <?php endif;  ?>
      </td>
      <td>
        <a class="btn btn-primary"  href="fact_edit.php?edit_id=<?= $fact['id'] ?>">Edit</a>
        <a class="btn btn-danger" href="fact_post.php?delet_id=<?= $fact['id'] ?>">Delet</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
  </table>
    </div>
  </div>
</div>



<!-- sweet alret -->
<?php if(isset($_SESSION['update'] )) : ?>

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
 title: "<?= $_SESSION['update'] ?>",
 color: 'green' ,
 position: 'top-end',
 background: '#fff',
});
</script>
<?php endif;unset($_SESSION['update']); ?>

<!-- insert error -->

<?php if(isset($_SESSION['insert_errors'] )) : ?>

<script>
const factError = Swal.mixin({
 toast: true,
 position: "center-end",
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
 title: "<?= $_SESSION['insert_errors'] ?>",
 color: 'red' ,
 position: 'center-end',
 background: '#fff',
});
</script>
<?php endif;unset($_SESSION['insert_errors']); ?>



<?php
// include footer
include('./extends/footer.php');

?>