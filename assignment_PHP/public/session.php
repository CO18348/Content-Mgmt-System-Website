<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['uname'];
   
   $ses_sql = mysqli_query($db,"select username from admins where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $uname = $row['username'];
   
   if(!isset($_SESSION['uname'])){
      header("location:login.php");
      die();
   }
?>