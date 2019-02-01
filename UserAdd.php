<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
require 'vendor/autoload.php';
use Meena\loginform\user;

$user_obj = new user();
var_dump($user_obj);
$check = $user_obj->checkadmin($_POST['emailusername'],$_POST['pass']);
if($check == 0) {
    include_once('Index.php');
}
else{    
    echo"You are not admin pls ask admin";
}
?>