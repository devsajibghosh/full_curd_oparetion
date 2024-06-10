<?php
// include header
include('./extends/header.php');
// include database 
include('../config/db.php');
// select all from skills
$select_query = "SELECT * FROM skills";
$skills = mysqli_query($db_connect,$select_query);
$serial = 1;
?>
<!-- insert ur skill -->
<div class="container">
<div class="row">
  <div class="col">
    <div class="page-description">
      <h1 class="fw-bold fs-1 text-primary">Skills_List<span class="text-warning">(✍🏻)</span></h1>
    </div>
  </div>
</div>
</div>

<!-- skills tables -->

<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Year</th>
      <th scope="col">Skills_%</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($skills as $skill) : ?>
    <tr>
      <td><?= $serial++ ?></td>
      <td><?= $skill['title'] ?></td>
      <td><?= $skill['year'] ?></td>
      <td><?= $skill['skill_percentage'] ?>%</td>
      <td>
        <?php if($skill['status'] == 'active') : ?>
        <a class="badge btn-success" href="skill_post.php?change_status=<?= $skill['id'] ?>">active</a>
          <?php else: ?>
        <a class="badge btn-danger" href="skill_post.php?change_status=<?= $skill['id'] ?>">deactive</a>
        <?php endif; ?>
      </td>
      <td>
        <a class="btn btn-primary" href="skill_edit.php?edit_id=<?= $skill['id'] ?>">Edit</a>
        <a class="btn btn-danger" href="skill_post.php?delet_id=<?= $skill['id'] ?>">Delete</a>
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


<!-- sweet alret -->

<?php if(isset($_SESSION['success_msg'] )) : ?>

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
 title: "<?= $_SESSION['success_msg'] ?>",
 color: 'green' ,
 position: 'top-end',
 background: '#fff',
});
</script>
<?php endif;unset($_SESSION['success_msg']); ?>







<?php
// include footer
include('./extends/footer.php');
?>