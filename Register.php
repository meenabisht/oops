<?php
include("Register.php");
include("user.php");
if($_SERVER["REQUEST_METHOD"]=="POST")
{  
  $reg_obj=new user();
  $result1=$reg_obj->userregister($_POST['name'],$_POST['addr'],$_POST['email'],$_POST['mobno'],$_POST['high_qual']);
  if(!$result1)
  {
  echo"not Inserted";}
  else
  {
      echo"Inserted";
  }
}
?>