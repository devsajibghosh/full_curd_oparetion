<?php
session_start();

if(!isset($_SESSION['admin_id'])){
  header('location:  login.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Responsive Admin Dashboard Template">
  <meta name="keywords" content="admin,dashboard">
  <meta name="author" content="stacks">
  <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <!-- Title -->
  <title>Neptune - Responsive Admin Dashboard Template</title>

  <!-- Styles -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
  <link href="./assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="./assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
  <link href="./assets/plugins/pace/pace.css" rel="stylesheet">

  <!-- Theme Styles -->
  <link href="./assets/css/main.min.css" rel="stylesheet">
  <link href="./assets/css/custom.css" rel="stylesheet">
  <!-- favicon link -->
  <link rel="shortcut icon" href="./assets/images/neptune.png" type="image/x-icon">
  <!-- link of sweet alret cdn -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <div class="app app-auth-sign-up align-content-stretch d-flex flex-wrap justify-content-end">
    <div class="app-auth-background bg-dark">

    </div>
    <div class="app-auth-container">
      <div class="logo">
        <a href="index.html">Neptune</a>
      </div>
      <p class="auth-description">Please enter your credentials to create an account.<br>Already have an account? <a href="login.php">Sign In</a></p>

      <!-- form start -->
      <form action="registration_post.php" method="POST">
        <div class="auth-credentials m-b-xxl">
          <label for="signUpUsername" class="form-label">Name</label>
          <input type="name" class="form-control m-b-md <?= (isset($_SESSION['name_error'])) ? 'is-invalid' : ''; ?>" id="signUpUsername" aria-describedby="signUpUsername" placeholder="Enter Name" name="name" value="<?= (isset( $_SESSION['old_name'])) ? $_SESSION['old_name'] : ''; unset( $_SESSION['old_name']) ?>">

          <!-- name error start -->
          <?php if (isset($_SESSION['name_error'])) : ?>
            <div id="emailHelp" class="form-text m-b-md text-danger"><?= $_SESSION['name_error']; ?></div>
          <?php endif;
          unset($_SESSION['name_error']); ?>
          <!-- name error end -->

          <label for="signUpEmail" class="form-label">Email address</label>
          <input type="email" class="form-control m-b-md <?= (isset($_SESSION['email_error'])) ? 'is-invalid' : ''; ?>" id="signUpEmail" aria-describedby="signUpEmail" placeholder="example@neptune.com" name="email" value="<?= (isset( $_SESSION['old_email'])) ? $_SESSION['old_email'] : ''; unset( $_SESSION['old_email']) ?>">

          <!-- email error start -->
          <?php if (isset($_SESSION['email_error'])) : ?>
            <div id="emailHelp" class="form-text m-b-md text-danger"><?= $_SESSION['email_error']; ?></div>
          <?php endif;
          unset($_SESSION['email_error']); ?>
          <!-- email error end -->

          <label for="signUpPassword" class="form-label">Password</label>
          <input type="password" class="form-control <?= (isset($_SESSION['password_error'])) ? 'is-invalid' : ''; ?>" id="signUpPassword" aria-describedby="signUpPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" name="password" value="<?= (isset( $_SESSION['old_password'])) ? $_SESSION['old_password'] : ''; unset( $_SESSION['old_password']) ?>">

          <!-- password error start -->
          <?php if (isset($_SESSION['password_error'])) : ?>
            <div id="emailHelp" class="form-text m-b-md text-danger"><?= $_SESSION['password_error']; ?></div>
          <?php endif;
          unset($_SESSION['password_error']); ?>
          <!-- password error end -->

          <label for="signUpPassword" class="form-label">Confirm Password</label>
          <input type="password" class="form-control <?= (isset($_SESSION['confirm_pass_error'])) ? 'is-invalid' : ''; ?>" id="signUpPassword" aria-describedby="signUpPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" name="confirm_password" value="<?= (isset( $_SESSION['old_confirm_password'])) ? $_SESSION['old_confirm_password'] : ''; unset( $_SESSION['old_confirm_password']) ?>">

          <!-- password error start -->
          <?php if (isset($_SESSION['confirm_pass_error'])) : ?>
            <div id="emailHelp" class="form-text m-b-md text-danger"><?= $_SESSION['confirm_pass_error']; ?></div>
          <?php endif;
          unset($_SESSION['confirm_pass_error']); ?>
          <!-- password error end -->

        </div>
        <div class="auth-submit">
          <button type="submit" class="btn btn-primary">Sign Up</button>
        </div>
      </form>
      <!-- form end -->

      <div class="divider"></div>
    </div>
  </div>

<!-- section of sweet alret -->

<!-- database error alert -->
<?php if(isset($_SESSION['db_error'] )) : ?>

<script>

const Toast = Swal.mixin({
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
Toast.fire({
 icon: "info",
 title: "<?= $_SESSION['db_error'] ?>",
 color: 'white' ,
 position: 'center-end',
 background: 'rgba(590, 10,2.0)',
});
</script>
<?php endif;unset($_SESSION['db_error']); ?>

<!-- email exists sweet alret -->

<?php if(isset($_SESSION['email_exists'] )) : ?>

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
 icon: "error",
 title: "<?= $_SESSION['email_exists'] ?>",
 color: 'red' ,
 position: 'center-end',
 background: '#fff',
});
</script>
<?php endif;unset($_SESSION['email_exists']); ?>

<!-- registration succesful -->

<?php if(isset($_SESSION['register_done'] )) : ?>

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
 icon: "success",
 title: "<?= $_SESSION['register_done'] ?>",
 color: 'green' ,
 position: 'center-end',
 background: '#fff',
});
</script>
<?php endif;unset($_SESSION['register_done']); ?>

<!-- end of sweet alret -->

  <!-- Javascripts -->
  <script src="./assets/plugins/jquery/jquery-3.5.1.min.js"></script>
  <script src="./assets/plugins/bootstrap/js/bootstrap.min.js"></script>
  <script src="./assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
  <script src="./assets/plugins/pace/pace.min.js"></script>
  <script src="./assets/js/main.min.js"></script>
  <script src="./assets/js/custom.js"></script>
</body>

</html>