<?php 
// db include
include('../config/db.php');
// session start
session_start();

// insert database

if(isset($_POST['insert_btn'])){
    $number = $_POST['number'];
    $description = $_POST['description'];
    $icon = $_POST['icon'];

    if($number && $icon && $description){
      $insert_query = "INSERT INTO facts (number,icon,description) VALUES ('$number','$icon','$description')";
      mysqli_query($db_connect,$insert_query);
      $_SESSION['update'] = "Updated Successfully👍🏾";
      header('location: fact.php');
    }else{
      $_SESSION['insert_errors'] = "Keep Insert📝";
      header('location: fact_insert.php');
    }
}

// delet btn 2 refer 1st btn name and 2nd id 

if(isset($_GET['delet_id'])){
  $id = $_GET['delet_id'] ;
  $delet_query = "DELETE FROM facts WHERE id='$id'";  
  mysqli_query($db_connect,$delet_query);
  header('location: fact.php');
}

// edit fact update


if(isset($_POST['update_fact'])){

  $number = $_POST['number'];
  $description = $_POST['description'];
  $icon = $_POST['icon'];
  $id = $_POST['fact_id'];

  if($number && $icon && $description){
    $update_query = "UPDATE facts SET number='$number',description='$description',icon='$icon' WHERE id='$id'";
    mysqli_query($db_connect,$update_query);
    $_SESSION['update'] = "Updated Successfully👍🏾";
    header('location: fact.php');
  }else{
    $_SESSION['fact_error'] = "Keep Insert📝";
    header('location: fact_edit.php');
  }
}



// change status -----


if(isset($_GET['change_status'])){
  $id = $_GET['change_status'];
  $status_query = "SELECT * FROM facts WHERE id='$id'";
  $connect = mysqli_query($db_connect,$status_query);
  $facts = mysqli_fetch_assoc($connect);

  if($facts['status'] == 'active'){
    $update_query = "UPDATE facts SET status='deactive' WHERE id='$id'";
    mysqli_query($db_connect,$update_query);
    header('location: fact.php');
  }else{
    $update_query = "UPDATE facts SET status='active' WHERE id='$id'";
    mysqli_query($db_connect,$update_query);
    header('location: fact.php');
  }
}

















?>