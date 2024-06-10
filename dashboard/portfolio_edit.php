<?php
// include header
include('./extends/header.php');
// db include
include('../config/db.php');


$id = $_GET['edit_id'];

$select_query = "SELECT * FROM portfolios WHERE id='$id'";
$connect = mysqli_query($db_connect,$select_query);

$port = mysqli_fetch_assoc($connect);

?>

<div class="container">
<div class="row">
  <div class="col">
    <div class="page-description">
      <h1 class="fw-bold fs-1 text-warning">Portfolio_Edit<span class="text-warning">(✍🏻)</span></h1>
    </div>
  </div>
</div>
</div>


<!-- portfolio insert  -->

<div class="container">
  <div class="row">
    <div class="col">
      <div class="card bg-primary text-white">
        <div class="card-body">
          <form action="portfolio_post.php" method="POST" enctype="multipart/form-data">
          <label for="title">Title</label>
          <textarea class="form-control" name="title"><?= $port['title'] ?></textarea>
          <label for="description">Description</label>
          <textarea class="form-control" name="description"><?= $port['description'] ?></textarea>
          <div>
          <span class="text-warning" >Your Old Image: <img style="width: 60px;height:60px; border: 1px solid #fff; border-radius: 5px;margin:5px" src="../images/portfolio/<?= $port['image'] ?>" alt=""></span>
          </div>
          <label for="image" class="">Choose New Image</label>
          <input type="file" class="form-control" name="image">
            <!-- data pass -->
          <input type="hidden" name="portfolio_id" value="<?= $port['id'] ?>">

          <button class="btn btn-success mt-4" type="submit" name="update_btn">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<?php
// include footer
include('./extends/footer.php');

?>