<?php
//this checks whether the user is an admin, if not, then it takes them to the home page
   include('db.php');
   session_start();

   $user_check = $_SESSION['login_user'];

   $ses_sql = mysqli_query($db,"select user from login where user = '$user_check' ");

   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_session = $row['user'];

   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
   if($_SESSION['login_user'] != 'admin'){
      header("location:home.php");
   }
?>
