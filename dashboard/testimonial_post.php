<?php 
// include database
include('../config/db.php');
// session start
session_start();

// insert into database this information

if(isset($_POST['insert_btn'])){
  $name = $_POST['name'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  $image = $_FILES['image']['name'];
  $image_tmp_name = $_FILES['image']['tmp_name'];
  // explode images 
  $explode = explode('.',$image);
  $extension = end($explode);
  // image name for database 
  $img_name = $name."-".date("d-m-Y").".".$extension ;
  $local_path = "../images/testimonial/".$img_name;

  if($name && $title && $description && $image){
    if(move_uploaded_file($image_tmp_name,$local_path)){
      $insert_query = "INSERT INTO testimonials (name,title,description,image) VALUES ('$name','$title','$description','$img_name')";
      mysqli_query($db_connect,$insert_query);
      $_SESSION['insert_success'] = "Insert Success👍🏾";
      header('location: testimonial.php');
    }
  }else{
    $_SESSION['insert_error'] = strtoupper("Keep Insert🔥");
    header('location: testimonial_insert.php');
  }

}

// change status

if(isset($_GET['change_status'])){
  $id = $_GET['change_status'];

  $select_query = "SELECT * FROM testimonials WHERE id='$id'";
  $connect = mysqli_query($db_connect,$select_query);
  $testimonial_person = mysqli_fetch_assoc($connect);

  if($testimonial_person['status'] == 'active'){
    $update_query = "UPDATE testimonials SET status='deactive' WHERE id='$id'";
    mysqli_query($db_connect,$update_query);
    header('location: testimonial.php');
  }else{
    $update_query = "UPDATE testimonials SET status='active' WHERE id='$id'";
    mysqli_query($db_connect,$update_query);
    header('location: testimonial.php');
  }
}


// delet work

if(isset($_GET['delet_id'])){
  $id = $_GET['delet_id'];
  $delet_query = "DELETE FROM testimonials WHERE id='$id'";
  mysqli_query($db_connect,$delet_query);
  header('location: testimonial.php');
}

// update work


if(isset($_POST['edit_btn'])){

  $id = $_POST['edit_id'];
  $name = $_POST['name'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  $image = $_FILES['image']['name'];
  $image_tmp_name = $_FILES['image']['tmp_name'];
  // explode images 
  $explode = explode('.',$image);
  $extension = end($explode);
  // image name for database 
  $img_name = "ID-NO-".$id."-".date("d-m-Y").".".$extension ;
  $local_path = "../images/testimonial/".$img_name;
  


  if($name && $title && $description){
    $update_query = "UPDATE testimonials SET name='$name',title='$title',description='$description' WHERE id='$id'";
    mysqli_query($db_connect,$update_query);
    header('location: testimonial.php');
  }

  $select_query = "SELECT * FROM testimonials";
  $connect = mysqli_query($db_connect,$select_query);
  $test = mysqli_fetch_assoc($connect);
  $update_path = "../images/testimonial/".$test['image'];

  if($image){
    if(move_uploaded_file($image_tmp_name,$local_path)){
      unlink('$update_path');
      $update_query = "UPDATE testimonials SET image='$img_name' WHERE id='$id'";
      mysqli_query($db_connect,$update_query);
      header('location: testimonial.php');
    }
  }
}


?>