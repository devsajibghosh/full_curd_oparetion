<?php

// include header
include('./extends/header.php');
// include database
include('../config/db.php');

// select brand tabale all info

$select_query = "SELECT * FROM brands";
$brands = mysqli_query($db_connect,$select_query);

$serial = 1 ;



?>

<div class="container">
  <div class="row">
    <div class="col">
      <div class="page-description">
        <h1 class="fw-bold fs-1 text-success">Brands_List<span class="text-success">(📝)</span></h1>
      </div>
    </div>
  </div>
</div>


<!-- barnding table -->


<div class="container">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
          <?php foreach($brands as $brand) : ?>
              <tr>
                <td><?= $serial++ ?></td>
                <td><img style="width: 60px;height:60px; border: 1px solid #fff; border-radius: 5px;" src="../images/brand/<?= $brand['image'] ?>" alt=""></td>
                <td>
                <?php if($brand['status'] == 'active') : ?>
                <a class="badge btn-success" href="brand_post.php?change_status=<?= $brand['id'] ?>">active</a>
                <?php else : ?>
                <a class="badge btn-danger" href="brand_post.php?change_status=<?= $brand['id'] ?>">deactive</a>
                <?php endif; ?>
                </td>
                <td>
                <a class="btn btn-primary"  href="brand_edit.php?brand_edit=<?= $brand['id'] ?>">Edit</a>
                <a class="btn btn-danger" href="brand_post.php?delet_id=<?= $brand['id'] ?>">Delet</a>
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





<!-- image updated successfully -->

<?php if(isset($_SESSION['upload_success'] )) : ?>

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
 title: "<?= $_SESSION['upload_success'] ?>",
 color: 'green' ,
 position: 'top-end',
 background: '#fff',
});
</script>
<?php endif;unset($_SESSION['upload_success']); ?>

<!-- delet success -->

<?php if(isset($_SESSION['delet_success'] )) : ?>

<script>
const deletSuccess = Swal.mixin({
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
deletSuccess.fire({
 icon: "success",
 title: "<?= $_SESSION['delet_success'] ?>",
 color: 'green' ,
 position: 'top-end',
 background: '#fff',
});
</script>
<?php endif;unset($_SESSION['delet_success']); ?>






<?php
// include footer
include('./extends/footer.php');
?>