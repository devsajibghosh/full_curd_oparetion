<?php 
// db connect 
include('../config/db.php');


// delet btn query

if(isset($_GET['delet_id']))
  $id = $_GET['delet_id'];
  $delet_query = "DELETE FROM mails WHERE id='$id'";
  mysqli_query($db_connect,$delet_query);
  header('location: mails_show.php');
?>