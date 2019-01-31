<?php
require 'vendor/autoload.php';
use Meena\loginform\user;
use Meena\loginform\DbConnect;
use Meena\loginform\Delete;
session_start();
if( isset($_SESSION['login_user']) )
{
  echo "welcome".$_SESSION['login_user']."!";
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
  $up_obj=new Delete();
  echo "id=".$_POST['id']."<br>";
  $up = $up_obj->updateuser($_POST['id'],$_POST['cname'],$_POST['email']);
  if(!$up)
  {
    echo"updated"; 
  }
  else
  {
    echo"not updated";
  }
}
?>
<html>
  <head></head>
  <body>
  <form action="Update.php" method="POST">
      <h3>Update</h3>
      id:<input type="text" name="id"><br>
      Name:<br><input type="text" name="cname"><br>
      E-mail id:<br><input type="text" name="email"><br>     
      <br><input type="submit"> 
</form>
  </body>
</html>