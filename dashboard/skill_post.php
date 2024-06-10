<?php 
// include database 
include('../config/db.php');
// session start
session_start();

if(isset($_POST['insert_btn'])){
  $title = $_POST['title'];
  $year = $_POST['year'];
  $skill_percentage = $_POST['skill_percentage'];

  if($title && $year && $skill_percentage){
    $insert_query = "INSERT INTO skills (title,year,skill_percentage) VALUES ('$title','$year','$skill_percentage')";
    mysqli_query($db_connect,$insert_query);
    $_SESSION['success_msg'] = strtoupper('insert successful');
    header('location: skill.php');
  }else{
    header('location: skill_insert.php');
  }
}

// chnage status

if(isset($_GET['change_status'])){
  $id = $_GET['change_status'];
  // select all person from skills table
  $select_query = "SELECT * FROM skills WHERE id='$id'";
  $connect = mysqli_query($db_connect,$select_query);
  $skill = mysqli_fetch_assoc($connect);
  if($skill['status'] == 'active'){
    $update_query = "UPDATE skills SET status='deactive' WHERE id='$id'";
    mysqli_query($db_connect,$update_query);
    header('location: skill.php');
  }else{
    $update_query = "UPDATE skills SET status='active' WHERE id='$id'";
    mysqli_query($db_connect,$update_query);
    header('location: skill.php');
  }
}

// delet query

if(isset($_GET['delet_id'])){
  $id = $_GET['delet_id'];
  $delet_query = "DELETE FROM skills WHERE id='$id'";
  mysqli_query($db_connect,$delet_query);
  header('location: skill.php');
}

// edit or update page 

if(isset($_POST['update_btn'])){
  $id = $_POST['edit_id'];
  $title = $_POST['title'];
  $year = $_POST['year'];
  $skill_percentage = $_POST['skill_percentage'];

  if($title && $year && $skill_percentage){
    $update_query = "UPDATE skills SET title='$title', year='$year',skill_percentage='$skill_percentage' WHERE id='$id'";
    mysqli_query($db_connect,$update_query);
    $_SESSION['success_msg'] = strtoupper('Update successful');
    header('location: skill.php');
  }
}



?>