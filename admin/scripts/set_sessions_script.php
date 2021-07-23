<?php
session_start();
if(isset($_POST['blogID'])){
    $_SESSION['blogID']=$_POST['blogID'];
}
if(isset($_POST['newsID'])){
    $_SESSION['newsID']=$_POST['newsID'];
}
//echo $_SESSION['newsID'];