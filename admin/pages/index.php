<?php
session_start();
if(isset($_SESSION['userID'])){
 echo header('location:dashboard.php');
}else{
  header('location:admin-login?notloggin=You are not logged in');
}