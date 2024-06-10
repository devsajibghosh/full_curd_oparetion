<?php
// include header
include('./extends/header.php');
// include database
include('../config/db.php');
// icons include
include('./extends/icons.php');

// fact select

$id = $_GET['edit_id'];

$select_query = "SELECT * FROM facts WHERE id='$id'";
$connect = mysqli_query($db_connect,$select_query);

$fact = mysqli_fetch_assoc($connect);


?>

<div class="container">
<div class="row">
  <div class="col">
    <div class="page-description">
      <h1 class="fw-bold fs-1 text-primary">Fact-Update: <?= $fact['id'] ?><span class="text-warning">(✍🏻)</span></h1>
    </div>
  </div>
</div>
</div>


<!-- facts insert  -->

<div class="container">
  <div class="row">
    <div class="card bg-warning">
      <div class="card-body">
        <form action="fact_post.php" method="POST">
          <div class="col">
            <label class="form-label fs-5 fw-light text-white">Input Number</label>
            <input type="text" class="form-control" placeholder="input your number....." name="number" value="<?= $fact['number'] ?>">
            <input type="hidden" value="<?= $fact['id'] ?>" name="fact_id">
          </div>
          <div class="col">
            <label class="form-label fs-5 fw-light text-white">Type Description</label>
            <textarea name="description" class="form-control" placeholder="type here....."><?= $fact['description'] ?></textarea>
          </div>
          <div class="col">
            <label class="form-label fs-5 fw-light text-white">Facts Icon</label>
            <textarea name="icon" class="form-control" id="factsicon" placeholder="select icon...."><?= $fact['icon'] ?></textarea>
          </div>
          <div class="col mt-3">
            <div class="card">
              <div class="card-boy scroll" style="overflow-y: auto; max-height: 250px; background-color: #161616; color: white; border-radius: 10px">
                <?php foreach ($icons as $icon) : ?>
                  <span class="fa-2x m-4"><i onclick="myFun(event)" class="<?= $icon ?>"></i></span>
                <?php endforeach; ?>
              </div>
            </div>


            <!-- input field connect icon -->
            <script>
              let input = document.getElementById('factsicon');
              function myFun() {
                input.value = event.target.getAttribute('class');
              }
            </script>
            <!-- icons sections end -->

          </div>
          <div class="col-4 mt-3">
            <button class="btn btn-primary px-4 py-3" name="update_fact">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- sweet alret -->

<!-- <?php if (isset($_SESSION['insert_errors'])) : ?>

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
    title: "<?= $_SESSION['insert_errors'] ?>",
    color: 'red',
    position: 'top-end',
    background: '#fff',
  });
</script>
<?php endif;
unset($_SESSION['insert_errors']); ?> -->

<?php
// include footer
include('./extends/footer.php');

?>