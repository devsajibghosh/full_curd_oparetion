<?php 
// include header
include('./extends/header.php');
// include db
include('../config/db.php');

// show all mails

$select_query = "SELECT * FROM mails ORDER BY id DESC";
$mails = mysqli_query($db_connect,$select_query);

$serial = 1;

?>

<!-- mails show  -->
<div class="container">
<div class="row">
  <div class="col">
    <div class="page-description">
      <h1 class="fw-bold fs-1 text-primary">Client Emails<span class="text-warning">(📩)</span></h1>
    </div>
  </div>
</div>
</div>

<!-- client email -->


<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
      <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Message__</th>
      <th scope="col">Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($mails as $mail) : ?>
    <tr>
      <td><?= $serial++ ?></td>
      <td><?= $mail['name'] ?></td>
      <td><?= $mail['email'] ?></td>
      <td><?= $mail['message'] ?></td>
      <td><?= $mail['date'] ?></td>
      <td>
        <a class="btn btn-danger" href="mail_delet.php?delet_id=<?= $mail['id'] ?>">Delete</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
      </div>
    </div>
  </div>
</div>


<?php 
include('./extends/footer.php');
?>