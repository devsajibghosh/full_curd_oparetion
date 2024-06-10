<?php
// include header
include('./extends/header.php');
include('./extends/icons.php');
include('../config/db.php');

// edit option update
$id = $_GET['edit_id'];

$service_query = "SELECT * FROM services WHERE id='$id'";
 $connect =  mysqli_query($db_connect,$service_query);
 $service = mysqli_fetch_assoc($connect);


?>

<div class="container">
  <div class="row">
    <div class="col">
      <div class="page-description">
        <h1 class="fw-bold fs-1">Service Update-: <b class="text-danger"><?= $service['id'] ?></b> <span class="text-primary">(✍🏻)</span></h1>
      </div>
    </div>
  </div>
</div>

<!-- insert your service option -->

<div class="container">
  <div class="row">
    <div class="card">
      <div class="card-body">
        <form action="service_post.php" method="POST">
          <i class="col">
            <label class="form-label">Title</label>
            <textarea name="title" class="form-control"><?= $service['title'] ?></textarea>
            <input type="hidden" value="<?= $service['id'] ?>" name="service_id">
          </i>
          <div class="col">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control"><?= $service['description'] ?></textarea>
          </div>
          <div class="col">
            <label class="form-label">Service Icon</label>
            <textarea name="icon" class="form-control" id="serviceicon"><?= $service['icon'] ?></textarea>
          </div>
          <div class="col mt-3">
            <div class="card bg-dark">
              <div class="card-boy scroll" style="overflow-y: auto; max-height: 300px; background-color: #161616; color: white; border-radius: 10px">
                <?php foreach ($icons as $icon) : ?>
                  <span class="fa-2x m-4"><i onclick="myFun(event)" class="<?= $icon ?>"></i></span>
                <?php endforeach; ?>
              </div>
            </div>


            <!-- input field connect icon -->
            <script>
              let input = document.getElementById('serviceicon');
              function myFun() {
                input.value = event.target.getAttribute('class');
              }
            </script>
            <!-- icons sections end -->

          </div>
          <div class="col-4 mt-3">
            <button class="btn btn-success fs-5 px-4 py-3" name="service_btn">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- sweet alret -->

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
      background: '#fff',
    });
  </script>
<?php endif;
unset($_SESSION['insert_error']); ?>








<?php
// include footer
include('./extends/footer.php');

?>