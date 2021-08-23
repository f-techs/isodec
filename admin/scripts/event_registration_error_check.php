<?php
if(isset($_POST['phone'])){
if(is_numeric($_POST['phone'])){
    echo 'ok';
}else{
    echo 'error';
}
}

if(isset($_POST['email'])){
    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        echo 'ok';
    }else{
        echo 'error';
    }
    }