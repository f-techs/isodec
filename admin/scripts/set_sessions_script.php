<?php
session_start();
if(isset($_POST['blogID'])){
    $_SESSION['blogID']=$_POST['blogID'];
}
//echo $_SESSION['blogID'];