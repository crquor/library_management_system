<?php
include $_SERVER['DOCUMENT_ROOT']."/includes/db.php";   
session_id("librarian");
session_start();
   
   $auser_check = $_SESSION['alogin_user'];
   
   $ases_sql = mysqli_query($con,"select ausername from librarian where ausername = '$auser_check' ");
   
   $arow = mysqli_fetch_array($ases_sql,MYSQLI_ASSOC);
   
   $alogin_session = $arow['ausername'];
   
   if(!isset($_SESSION['alogin_user'])){
      header("location: /librarian/login");
      die();
   }
?>