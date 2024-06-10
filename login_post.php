<?php  

// session start
session_start();
// database include
include('./config/db.php');

$email = $_POST['email'];
$password = md5($_POST['password']);


if($email && $password){
  $select_query = "SELECT COUNT(*) AS result FROM users WHERE email='$email' AND password='$password'" ;

  $connect = mysqli_query($db_connect,$select_query);

  if(mysqli_fetch_assoc($connect)['result'] == 1){
    $select_user = "SELECT * FROM users WHERE email='$email'";
    $user_connect = mysqli_query($db_connect,$select_user);
    // user connect to database
    $user = mysqli_fetch_assoc($user_connect);
    // generate session for next page
    $_SESSION['admin_id'] = $user['id'];
    $_SESSION['admin_name'] = $user['name'];
    $_SESSION['admin_email'] = $user['email'];
    $_SESSION['admin_image'] = $user['image'];
    
    // data pass by home page
    header('location: ./dashboard/home.php');
  }else{
    $_SESSION['login_error'] = "This information not register*";
    header("location: login.php");
  }
}else{
  $_SESSION['login_error'] = "Need Your Email & Password*";
  header("location: login.php");
}

?>