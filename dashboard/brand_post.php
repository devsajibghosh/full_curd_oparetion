<?php
// session start
session_start();
// database insert
include('../config/db.php');



// updated brand image 

if (isset($_POST['insert_img'])) {
  $image = $_FILES['image']['name'];
  $tmp_name = $_FILES['image']['tmp_name'];

  // There are 2 parts: name and extension
  $explode = explode('.', $image);
  // Get extension
  $extension = end($explode);

  // New name given
  $new_name = 'brand' . date('s-i-h-d-m-Y') . '.' . $extension;

  // New location of image storage
  $path = "../images/brand/" . $new_name;

  // Check if the file was uploaded and moved successfully

  if (move_uploaded_file($tmp_name, $path)) {
    if ($image) {
      // Insert the new image name into the database
      $insert_query = "INSERT INTO brands (image) VALUES ('$new_name')";
      if (mysqli_query($db_connect, $insert_query)) {
        $_SESSION['upload_success'] = "Image Uploded Success👍🏾";
        header('location: brand.php');
        exit();
      }
    }
  } else {
    $_SESSION['img_error'] = "Please Choose Your Image🌋";
    header("location: brand_insert.php");
  }
}

// delet brands query 

if (isset($_GET['delet_id'])) {
  $id = $_GET['delet_id'];
  $delet_query = "DELETE FROM brands WHERE id='$id'";
  mysqli_query($db_connect, $delet_query);
  $_SESSION['delet_success'] = strtoupper("Successfully DELETED🌋");
  header('location: brand.php');
}

// update your brand image 


if(isset($_POST['update_img'])){

  $image = $_FILES['image']['name'];
  $image_tmp_name = $_FILES['image']['tmp_name'];
  $explode = explode('.',$image);
  $extension = end($explode);
  $id = $_POST['brand_id'];
  $new_name = 'Update'."-"."-".date("d-m-Y").".".$extension ;
  $local_path = "../images/brand/".$new_name;

  // local storage transfer my new storage
  if(move_uploaded_file($image_tmp_name,$local_path)){
    $image_update_query = "UPDATE brands SET image='$new_name' WHERE id='$id'";
    mysqli_query($db_connect,$image_update_query);
    $_SESSION['upload_success'] = "Image Uploded Success👍🏾";
    header('location: brand.php');
  }

  $select_img = "SELECT * FROM brands WHERE id='$id'";
  $connect = mysqli_query($db_connect,$select_img);
  $brand = mysqli_fetch_assoc($connect);
  // update path location
  $update_path = "../images/brand/".$brand['image'];

  if($image){
    if(move_uploaded_file($tmp_name,$path)){
      unlink($update_path);
      $image_update_query = "UPDATE brands SET image='$new_name' WHERE id='$id'";
      mysqli_query($db_connect,$image_update_query);
      header('location: brand.php');
    }
  }else{
    header('location: brand.php');
  }

}


// brand active and deactive----


if(isset($_GET['change_status'])){
  $id = $_GET['change_status'];
  $status_query = "SELECT * FROM brands WHERE id='$id'";
  $connect = mysqli_query($db_connect,$status_query);
  $brands = mysqli_fetch_assoc($connect);

  if($brands['status'] == 'active'){
    $update_query = "UPDATE brands SET status='deactive' WHERE id='$id'";
    mysqli_query($db_connect,$update_query);
    header('location: brand.php');
  }else{
    $update_query = "UPDATE brands SET status='active' WHERE id='$id'";
    mysqli_query($db_connect,$update_query);
    header('location: brand.php');
  }
}








