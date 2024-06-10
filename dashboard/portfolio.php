<?php
// include header
include('./extends/header.php');
//session start
// include db
include('../config/db.php');

// select all item of portfolios

$select_query = "SELECT * FROM portfolios";
$portfolios  = mysqli_query($db_connect,$select_query);

$serial_id = 1 ;



?>

<div class="container">
<div class="row">
  <div class="col">
    <div class="page-description">
      <h1 class="fw-bold fs-1 text-primary">Portfolios_List_<span class="text-warning">(✍🏻)</span></h1>
    </div>
  </div>
</div>
</div>


<!-- portfolio list  -->

<div class="container">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
        <table class="table">
  <thead>
    <tr>
      <th class="fw-bold text-dark" scope="col">ID</th>
      <th class="fw-bold text-dark" scope="col">Title</th>
      <th class="fw-bold text-dark" scope="col">Description</th>
      <th class="fw-bold text-dark" scope="col">Image</th>
      <th class="fw-bold text-dark" scope="col">Status</th>
      <th class="fw-bold text-dark" scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($portfolios as $portfolio) : ?>
    <tr>
      <th class="fw-bolder  text-danger" scope="row"><?= $serial_id ++ ?></th>
      <td class="fw-bold  text-warning"><?= $portfolio['title'] ?></td>
      <td class="fw-bold  text-warning"><?= $portfolio['description'] ?></td>
      <td>
      <img style="width: 60px;height:60px; border: 1px solid #fff; border-radius: 5px;" src="../images/portfolio/<?= $portfolio['image'] ?>" alt=""></td>
      </td>
      <td class="fw-bold  text-warning">
        <?php if($portfolio['status'] == 'active') : ?>
        <a class="badge btn-success" href="portfolio_post.php?change_status=<?= $portfolio['id'] ?>">active</a> 
        <?php else : ?>       
        <a class="badge btn-danger" href="portfolio_post.php?change_status=<?= $portfolio['id'] ?>">deactive</a>
        <?php endif; ?>       
      </td>
      <td class="fw-bold  text-warning">
        <a href="portfolio_edit.php?edit_id=<?= $portfolio['id'] ?>" class="btn btn-primary">Edit</a>
        <a href="portfolio_post.php?delet_id=<?= $portfolio['id'] ?>" class="btn btn-danger">Delet</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
        </div>
      </div>
    </div>
  </div>
</div>





<!-- swal alret  -->


<!-- success msg -->
 
<?php if(isset($_SESSION['success_insert'] )) : ?>

<script>
const successMsg = Swal.mixin({
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
successMsg.fire({
 icon: "success",
 title: "<?= $_SESSION['success_insert'] ?>",
 color: 'green' ,
 position: 'top-end',
 background: '#fff',
});
</script>
<?php endif;unset($_SESSION['success_insert']); ?>


<!-- edited successfully -->

<?php if(isset($_SESSION['success_update'] )) : ?>

<script>
const sssMsg = Swal.mixin({
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
sssMsg.fire({
 icon: "success",
 title: "<?= $_SESSION['success_update'] ?>",
 color: 'green' ,
 position: 'top-end',
 background: '#fff',
});
</script>
<?php endif;unset($_SESSION['success_update']); ?>







<?php
// include footer
include('./extends/footer.php');

?>