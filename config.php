<?php
session_start();
$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'db' => 'db_isodec'
    ),
    'cookie' => array(
        'cookie_name' => 'cookie_hash',
        'cookie_expiry' => 3600
    ),
    'session' => array(
        'session_name' => 'user'
    )
);
spl_autoload_register(function($classname) {
    require_once 'classes/' . $classname . '.php';
});

//App Root
define('APPROOT',dirname(__FILE__));
//URL Root
define('URLROOT', 'http://localhost:8080/isodec');
//sITE Name
define('SITENAME', 'ISODEC - GHANA');

//other requires
require_once(APPROOT.'/helpers/fetchs.php');
require_once(APPROOT.'/helpers/functions.php');