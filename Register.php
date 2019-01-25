<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
spl_autoload_register(function ($class_name){    
  include($class_name.".php");
});

// include("user.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){  
  $reg_obj = new user();
  $result1 = $reg_obj->userregister($_POST['name'],$_POST['addr'],$_POST['email'],$_POST['password'],$_POST['mobno'],$_POST['high_qual']);
  if(!$result1)
  {
    echo"not Inserted";}
  else
  {
    echo"Inserted";
  }
}

?>