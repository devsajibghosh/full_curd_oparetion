<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include('../src/PHPMailer.php');
include('../src/SMTP.php');
include('../src/Exception.php');

$mail = new PHPMailer(true);

include('../config/db.php');
session_start();

if(isset($_POST['send_btn'])){

$email_to = "devsajibghosh@gmail.com" ;
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$subject = "Curd gretting message";
$body = "Thanks $name for joining our Curd Community".'<br>'."We are Happy to your joining $name";


if($name && $email && $message){

  //Server settings
// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
$mail->isSMTP();                                            //Send using SMTP
$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = 'kumarsajibghosh@gmail.com';                     //SMTP username
$mail->Password   = 'vudv dmbr atin mihs';                               //SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


//Recipients
$mail->setFrom('admin@dev.com', 'GHOSH COMMUNITY');
$mail->addAddress($email, $name);     //Add a recipient
// $mail->addAddress('ellen@example.com');               //Name is optional
// replay email 
$mail->addReplyTo($email_to);                      
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

//Attachments
// $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

//Content
$mail->isHTML(true);                                  //Set email format to HTML
$mail->Subject = $subject;
$mail->Body    = $body;
// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


if($mail->send()){
  $date = date("d-m-Y");
  $insert_query = "INSERT INTO mails (name,email,message,date) VALUES ('$name','$email','$message','$date')";
  mysqli_query($db_connect,$insert_query);
  $_SESSION['mail_success'] = "mail is received by admin👍🏾";
  }
  header("location: ../index.php#contact");
}else{
  $_SESSION['mail_success'] = "Keep Insert🔥";
  header("location: ../index.php#contact");
}

}



?>