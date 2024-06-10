<?php

// session start
session_start();
// include database
include('../config/db.php');


// ! name update start

if (isset($_POST['update_name'])) {
  $name = $_POST['name'];
  if ($name) {
    $id = $_SESSION['admin_id'];
    $update_name_query = "UPDATE users SET name='$name' WHERE id='$id'";
    // connect to database
    mysqli_query($db_connect, $update_name_query);
    $_SESSION['admin_name'] = $name;
    // send msg a users
    $_SESSION['name_success'] = strtoupper('name updated successfull👍🏾');
    header('location: profile.php ');
  } else {
    // send msg a users
    $_SESSION['name_error'] = strtoupper('Enter your name❌');
    header('location: profile.php ');
  }
}


// ! Email update

if (isset($_POST['update_email'])) {
  $email = $_POST['email'];
  if ($email) {
    $id = $_SESSION['admin_id'];
    // update email- column name $email is value
    $update_email_query = "UPDATE users SET email='$email' WHERE id='$id'";
    // connect to database
    mysqli_query($db_connect, $update_email_query);
    $_SESSION['admin_email'] = $email;
    // email update message
    $_SESSION['email_succcess'] = strtoupper('email updated successfull👍🏾');
    header('location: profile.php');
  } else {
    // email error message
    $_SESSION['email_eror'] = strtoupper('Enter your email❌');
    header('location: profile.php ');
  }
}


// ! update password ******

if (isset($_POST['update_password'])) {

  $current_password = $_POST['current_password'];
  $new_password     = $_POST['new_password'];
  $confirm_password = $_POST['confirm_password'];
  $user_id = $_SESSION['admin_id'];

  if ($current_password) {
    $encrypt = md5($current_password);
    $select_pass_query = "SELECT COUNT(*) AS pass_check FROM users WHERE id='$user_id' AND password='$encrypt'";
    $connect = mysqli_query($db_connect, $select_pass_query);
    // check current pass
    if (mysqli_fetch_assoc($connect)['pass_check'] == 1) {
      if ($new_password) {
        if ($confirm_password) {
          // current pass == new pass right or wrong
          if ($confirm_password == $new_password) {
            $new_encrypt = md5($new_password);
            // update new password
            $update_query = "UPDATE users SET password='$new_encrypt' WHERE id='$user_id'";
            mysqli_query($db_connect, $update_query);
            $_SESSION['password_errors'] = "Password updated successfully👍🏾";
            header("location: profile.php");
          } else {
            $_SESSION['password_errors'] = "New password and confirm password do not match.";
            header("location: profile.php");
          }
        } else {
          $_SESSION['password_errors'] = "Please enter confirm password";
          header("location: profile.php");
        }
      } else {
        $_SESSION['password_errors'] = "Please enter new password";
        header("location: profile.php");
      }
    } else {
      $_SESSION['password_errors'] = "Incorrect current password";
      header("location: profile.php");
    }
  } else {
    $_SESSION['password_errors'] = "Please enter current password";
    header("location: profile.php");
  }
}


//image updated

if(isset($_POST['update_image'])){

  $image = $_FILES['image']['name'];
  $image_tmp_name = $_FILES['image']['tmp_name'];
  $explode = explode('.',$image);
  $extension = end($explode);

  $id = $_SESSION['admin_id'];
  $admin_name = $_SESSION['admin_name'] ;

  $new_name = $id."-".$admin_name."-".date("d-m-Y").".".$extension ;

  $local_path = "../images/profile/".$new_name;

  // local storage transfer my new storage
  if(move_uploaded_file($image_tmp_name,$local_path)){
    $image_update_query = "UPDATE users SET image='$new_name' WHERE id='$id'";
    mysqli_query($db_connect,$image_update_query);
    $_SESSION['admin_image'] = $new_name ;
    // image success msg
    $_SESSION['img_success'] = "Sucessfully Uploaded Your Image👍🏾";
    header("location: profile.php");
  }else{
    $_SESSION['img_error'] = "Please Choose Your Image🌋";
    header("location: profile.php");
  }

}