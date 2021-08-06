<?php
function random_code($length_of_string)
{
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    return substr(str_shuffle($str_result),0, $length_of_string);
}
function txtTruncate($string, $limit, $break=".", $pad="...")
{
  // return with no change if string is shorter than $limit
  if(strlen($string) <= $limit) return $string;

  // is $break present between $limit and the end of the string?
  if(false !== ($breakpoint = strpos($string, $break, $limit))) {
    if($breakpoint < strlen($string) - 1) {
      $string = substr($string, 0, $breakpoint) . $pad;
    }
  }

  return $string;
}

function sessionExpire(){
  if(isset($_SESSION["userID"]))
{ 
 if(time()-$_SESSION["loginTime"]>1800)
     {
     $_SESSION["expireTime"]=time()-$_SESSION["loginTime"]>1800;
     header("location:".URLROOT."/admin/scripts/logout_script.php");
 }else
     {
     $_SESSION["loginTime"]=time();
     }
} else {
    header("location:".URLROOT."/admin/pages/index.php");
}
}
