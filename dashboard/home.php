<?php
// include header
include('./extends/header.php');
// session start
?>


<div class="row">
  <div class="col">
    <div class="page-description">
      <h1>Dashboard</h1>
      <h2 class="text-danger fs-5">WELCOME!</h2>
      <span class="h5">Admin Name: <?= $_SESSION['admin_name']; ?></span>
      <br>
      <span class="h6 text-primary">Admin Email: <?= $_SESSION['admin_email']; ?></span>
    </div>
  </div>
</div>



<?php
// include footer
include('./extends/footer.php');

?>