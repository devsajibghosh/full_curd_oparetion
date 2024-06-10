<?php
// include header
include('./extends/header.php');
// session start
?>


<div class="row">
  <div class="col">
    <div class="page-description">
      <h1>Profile</h1>
    </div>
  </div>
</div>


<div class="container">
  <div class="row">
    <div class="col-lg-6 col-md-12 ">
      <div class="card bg-warning">
        <div class="card-header text-white">
          Update Name
        </div>
        <div class="card-body">
          <form action="profile_post.php" method="POST">
            <div class="input-group mb-3">
              <input type="name" class="form-control" placeholder="Update your name..." aria-label="Recipient's username" aria-describedby="button-addon2" name="name">

              <button class="btn btn-outline-primary" type="submit" id="button-addon1" name="update_name">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- update your email -->

  <div class="col-lg-6 col-md-12">
    <div class="card bg-warning">
      <div class="card-header text-white">
        Update Email
      </div>
      <div class="card-body">

        <form action="profile_post.php" method="POST">
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Update your email..." aria-label="Recipient's username" aria-describedby="button-addon2" name="email">

            <button class="btn btn-outline-primary" type="submit" id="button-addon1" name="update_email">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

<!-- update password image -->

<div class="container">
  <div class="row">
    <div class="col-lg-6 col-md-6">
      <div class="card">
        <div class="card-header">
          <h5>Password Update</h5>
        </div>
        <div class="card-body">
          <form action="profile_post.php" method="POST">

            <input type="password" class="form-control mb-2" id="exampleInputPassword1" placeholder="Enter Your Current Password" name="current_password">

            <input type="password" class="form-control mb-2" id="exampleInputPassword2" placeholder="Enter Your New Password" name="new_password">

            <input type="password" class="form-control mb-2" id="exampleInputPassword3" placeholder="Enter Your Confirm Password" name="confirm_password">

            <button class="btn btn-primary" name="update_password">Update</button>
          </form>
        </div>
      </div>
    </div>

    <!-- image update -->

    <div class="col-lg-6 col-md-6">
      <div class="card">
        <div class="card-header">
          <h5>Profile Image Update</h5>
        </div>
        <div class="card-body">

          <form action="profile_post.php" method="POST" enctype="multipart/form-data">
          <img style="width:50px; height: 50px;border: 1px solid red; margin-bottom:3px; border-radius:50%;" src="../images/profile/<?= $_SESSION['admin_image'] ?>">
            <input type="file" class="form-control mb-3" name="image">
            <button class="btn btn-primary" name="update_image">Update</button>
          </form>

          </div>
      </div>
    </div>



  </div>
</div>







<!-- sweeet alret msg -->

<?php if (isset($_SESSION['name_error'])) : ?>

  <script>
    const regDone = Swal.mixin({
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
    regDone.fire({
      icon: "info",
      title: "<?= $_SESSION['name_error'] ?>",
      color: 'red',
      position: 'top-end',
      background: '#fff',
    });
  </script>
<?php endif;
unset($_SESSION['name_error']); ?>

<!-- name update successfull**** -->

<?php if (isset($_SESSION['name_success'])) : ?>

  <script>
    const nameDone = Swal.mixin({
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
    nameDone.fire({
      icon: "success",
      title: "<?= $_SESSION['name_success'] ?>",
      color: 'white',
      position: 'top-end',
      background: 'green',
    });
  </script>
<?php endif;
unset($_SESSION['name_success']); ?>

<!-- email error msg -->

<?php if (isset($_SESSION['email_eror'])) : ?>

  <script>
    const emailError = Swal.mixin({
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
    emailError.fire({
      icon: "info",
      title: "<?= $_SESSION['email_eror'] ?>",
      color: 'red',
      position: 'top-end',
      background: '#fff',
    });
  </script>
<?php endif;
unset($_SESSION['email_eror']); ?>

<!-- email successfull msg -->

<?php if (isset($_SESSION['email_succcess'])) : ?>

  <script>
    const emailDone = Swal.mixin({
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
    emailDone.fire({
      icon: "success",
      title: "<?= $_SESSION['email_succcess'] ?>",
      color: 'white',
      position: 'top-end',
      background: 'green',
    });
  </script>
<?php endif;
unset($_SESSION['email_succcess']); ?>


<!-- pass-update successfull & error msg -->

<?php if (isset($_SESSION['password_errors'])) : ?>

  <script>
    const passError = Swal.mixin({
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
    passError.fire({
      icon: "info",
      title: "<?= $_SESSION['password_errors'] ?>",
      color: 'aqua',
      position: 'top-end',
      background: '#fff',
    });
  </script>
<?php endif;
unset($_SESSION['password_errors']); ?>


<!-- image upload msg -->

<?php if (isset($_SESSION['img_success'])) : ?>

<script>
  const imgDone = Swal.mixin({
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
  imgDone.fire({
    icon: "success",
    title: "<?= $_SESSION['img_success'] ?>",
    color: 'white',
    position: 'top-end',
    background: 'green',
  });
</script>
<?php endif;
unset($_SESSION['img_success']); ?>


<!-- image error msg -->


<?php if (isset($_SESSION['img_error'])) : ?>

<script>
  const imgError = Swal.mixin({
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
  imgError.fire({
    icon: "info",
    title: "<?= $_SESSION['img_error'] ?>",
    color: '#fff',
    position: 'top-end',
    background: 'red',
  });
</script>
<?php endif;
unset($_SESSION['img_error']); ?>

<!-- end of sweet alret -->





<?php
// include footer
include('./extends/footer.php');
?>