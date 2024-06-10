<?php 
// start session
session_start();
// incluide database 
include('../config/db.php');


// insert database image title and description

if(isset($_POST['insert_btn'])){
  $title = $_POST['title'];
  $description = $_POST['description'];
  $image = $_FILES['image']['name'];
  $img_tmp_name = $_FILES['image']['tmp_name'];

  $explode = explode('.',$image);
  $extension = end($explode);

  $new_name = $title."-".date("d-m-Y").'.'.$extension;
  $local_path = "../images/portfolio/". $new_name;

  if($title && $description && $new_name){

    if(move_uploaded_file($img_tmp_name,$local_path)){
      $insert_query = "INSERT INTO portfolios (title,description,image) VALUES ('$title','$description','$new_name')";
      mysqli_query($db_connect,$insert_query);
      $_SESSION['success_insert'] = "Insert Successfull😎";
      header('location: portfolio.php');
    }

  }else{
    $_SESSION['erro_msg'] = strtoupper("Keep Upload.........");
    header('location: portfolio_insert.php');
  }

}


// change status

if(isset($_GET['change_status'])){
  $id = $_GET['change_status'];

  // select from all users 

  $select_query = "SELECT * FROM portfolios WHERE id='$id'";
  $connect = mysqli_query($db_connect,$select_query);
  $portfolio = mysqli_fetch_assoc($connect);

  if($portfolio['status'] == 'active'){
    $update_query = "UPDATE portfolios SET status='deactive' WHERE id='$id'";
    mysqli_query($db_connect,$update_query);
    header('location: portfolio.php');
  }else{
    $update_query = "UPDATE portfolios SET status='active' WHERE id='$id'";
    mysqli_query($db_connect,$update_query);
    header('location: portfolio.php');
  }

}


// delet part 

if(isset($_GET['delet_id'])){
  $id = $_GET['delet_id'];
  $delet_query = "DELETE FROM portfolios WHERE id='$id'";
  mysqli_query($db_connect,$delet_query);
  header('location: portfolio.php');
}



// update image title and description


if(isset($_POST['portfolio_id'])){

  $title = $_POST['title'];
  $description = $_POST['description'];
  $image = $_FILES['image']['name'];
  $img_tmp_name = $_FILES['image']['tmp_name'];
  $id = $_POST['portfolio_id'];

  $explode = explode('.',$image);
  $extension = end($explode);

  $new_name = "ID-".$id."-".date("d-m-Y").'.'.$extension;
  $local_path = "../images/portfolio/". $new_name;


  if($title && $description){
      $update_query = "UPDATE portfolios SET title='$title',description='$description' WHERE id='$id'";
      mysqli_query($db_connect,$update_query);
      $_SESSION['success_update'] = "Update Successfull😎";
      header('location: portfolio.php');
  }
    // select all data from database table portfolios
  $select_query = "SELECT * FROM portfolios";
  $connect = mysqli_query($db_connect,$select_query);
  $port = mysqli_fetch_assoc($connect);
  $update_path = "../images/portfolio/".$port['image'];

 if($image){
  if(move_uploaded_file($img_tmp_name,$local_path)){
    unlink('$update_path');
    $update_query = "UPDATE portfolios SET image='$new_name' WHERE id='$id'";
    mysqli_query($db_connect,$update_query);
    $_SESSION['success_update'] = "Update Successfull😎";
    header('location: portfolio.php');
  }
 }
}


























?>