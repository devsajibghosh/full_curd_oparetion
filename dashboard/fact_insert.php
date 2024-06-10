<?php
// include header
include('./extends/header.php');
// icons include
include('./extends/icons.php');


?>

<div class="container">
<div class="row">
  <div class="col">
    <div class="page-description">
      <h1 class="fw-bold fs-1 text-primary">Fact_Insert<span class="text-warning">(✍🏻)</span></h1>
    </div>
  </div>
</div>
</div>


<!-- facts insert  -->

<div class="container">
  <div class="row">
    <div class="card bg-dark">
      <div class="card-body">
        <form action="fact_post.php" method="POST">
          <div class="col">
            <label class="form-label fs-5 fw-light text-white">Input Number</label>
            <input type="text" class="form-control" placeholder="input your number....." name="number">
          </div>
          <div class="col">
            <label class="form-label fs-5 fw-light text-white">Type Description</label>
            <textarea name="description" class="form-control" placeholder="type here....."></textarea>
          </div>
          <div class="col">
            <label class="form-label fs-5 fw-light text-white">Facts Icon</label>
            <textarea name="icon" class="form-control" id="factsicon" placeholder="select icon...."></textarea>
          </div>
          <div class="col mt-3">
            <div class="card">
              <div class="card-boy scroll" style="overflow-y: auto; max-height: 200px; background-color: #e67e22; color: white; border-radius: 10px">
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
            <button class="btn btn-primary px-4 py-3" name="insert_btn">Insert</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- sweet alret -->

<?php if (isset($_SESSION['insert_errors'])) : ?>

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
unset($_SESSION['insert_errors']); ?>

<?php
// include footer
include('./extends/footer.php');

?>