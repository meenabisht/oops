<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
// echo"meena";
require 'vendor/autoload.php';
use Meena\loginform\user;

$user_obj = new User();
$check = $user_obj->checkadmin($_POST['emailusername'],$_POST['pass']);
if($check) {
    include_once('Index.php');
}
else{    
    echo"u are not admin pls ask admin";
}


?>