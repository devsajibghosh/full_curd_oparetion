<?php 
// db include
include('../config/db.php');
// session start
session_start();

if(isset($_POST['insert_btn'])){
  $title = $_POST['title'];
  $description = $_POST['description'];
  $icon = $_POST['icon'];

  if($title && $description && $icon){
    $insert_query = "INSERT INTO services (title,description,icon) VALUES ('$title','$description','$icon')";

    mysqli_query($db_connect,$insert_query);

    $_SESSION['insert_success'] = "Insert Successfully*";
    header('location: service.php');
  }else{
    $_SESSION['insert_error'] = strtoupper('Kindly Input*');
    header('location: service_insert.php');
  }
}


//! delet btn 

// delet id 2 refer 1 delet name - btn name and id name

if(isset($_GET['delete_id'])){
  $id = $_GET['delete_id'];
  // delet query
  $delet_query = "DELETE FROM services WHERE id='$id'";
  mysqli_query($db_connect,$delet_query);
  $_SESSION['delet_msg'] = "Sucessfully Deleted*";
  header('location: service.php');
}

// active and deactive 

if(isset($_GET['change_status'])){
  $id = $_GET['change_status'];
  $status_query = "SELECT * FROM services WHERE id='$id'";
  $connect = mysqli_query($db_connect,$status_query);
  $service = mysqli_fetch_assoc($connect);

  if($service['status'] == 'active'){
    $update_query = "UPDATE services SET status='deactive' WHERE id='$id'";
    mysqli_query($db_connect,$update_query);
    header('location: service.php');
  }else{
    $update_query = "UPDATE services SET status='active' WHERE id='$id'";
    mysqli_query($db_connect,$update_query);
    header('location: service.php');
  }
}


// edit update


if(isset($_POST['service_btn'])){
  $title = $_POST['title'];
  $description = $_POST['description'];
  $icon = $_POST['icon'];
  $id = $_POST['service_id'];

  if($title && $description && $icon){

    $update_query = "UPDATE services SET title='$title',description='$description',icon='$icon' WHERE id='$id'";
    
    mysqli_query($db_connect,$update_query);

    $_SESSION['insert_success'] = "Edited Successfully*";
    header('location: service.php');
  }else{
    $_SESSION['insert_error'] = strtoupper('Kindly Input*');
    header('location: service_edit.php');
  }
}








?>