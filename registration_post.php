<?php 
// session start
session_start();
// include database
include('./config/db.php');


$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];


// name part

if($name){
  $_SESSION['old_name'] = $name;
}else{
  $_SESSION['name_error'] = "name is missing*";
  header("location: registration.php");
}

// email part

if($email){
  if(filter_var($email,FILTER_VALIDATE_EMAIL)){
    $_SESSION['old_email'] = $email;
  }else{
    $_SESSION['email_error'] = "email is not valid*";
    header("location: registration.php");
  }
}else{
  $_SESSION['email_error'] = "email is missing*";
  header("location: registration.php");
}

// password part 

if($password){
  if(preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)){
    $_SESSION['old_password'] = $password;
  }else{
    $_SESSION['password_error'] = "password required can't match*";
    header("location: registration.php");
  }
}else{
  $_SESSION['password_error'] = "password is missing*";
  header("location: registration.php");
}


// confirm password

if($confirm_password){
  if($confirm_password == $password){
    $_SESSION['old_confirm_password'] = $confirm_password;
  }else{
    $_SESSION['confirm_pass_error'] = "password & confirm password not match*";
    header("location: registration.php");
  }
  }else{
  $_SESSION['confirm_pass_error'] = "confirm password is missing*";
  header("location: registration.php");
}


// DBS CONNECTION ---->>

  if($name && $email && $password){

    $select_query = "SELECT COUNT(*) AS email_check FROM users WHERE email='$email' ";
    $connect = mysqli_query($db_connect,$select_query);

    if(mysqli_fetch_assoc($connect)['email_check'] == 0 ){
      // password encrypted
      $encrypt_password = md5($password);
      $insert_query = "INSERT INTO  users(name,email,password) VALUES ('$name','$email','$encrypt_password')";
      mysqli_query($db_connect,$insert_query);

      // send email and password for login
      $_SESSION['send_email'] = $email;
      $_SESSION['send_password'] = $password; 
      
      $_SESSION['register_done'] = "Registration Succefull👍🏾";
      header("location: login.php");

    }else{
      $_SESSION['email_exists'] = "This email is already exists*";
      header("location: registration.php");
    }
  }else{
    $_SESSION['db_error'] = "Something is wrong*";
    header("location: registration.php");
  }


?>