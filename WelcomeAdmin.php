<?php
require 'vendor/autoload.php';
use Meena\loginform\user;
use Meena\loginform\DbConnect;
use Meena\loginform\Delete;
session_start();
if( isset($_SESSION['login_user']))
{
  echo "welcome".$_SESSION['login_user']."!";
  echo"<br>";
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $del_obj=new Delete();
  // echo "id=".$_POST['id']."<br>";
  $obj = $del_obj->deleteuser($_POST['user_ id']);
  if(!$obj)
  {
    echo"deleted"; 
  }
  else
  {
    echo"not deleted";
  }
}
?>
<html>
  <head></head>
  <body>
      <form action="" method="POST">
     <button type="submit"><a href="logout.php">Logout</a></button><br>
     <a href="ShowUser.php">Show User</a><br>
     <a href="UserAdd.php">Add User</a><br>
     enter id for delete user<br>
     id:<input type="text" name="user_id"><br>   
     Delete:<input type="submit">
     <a href="Update.php">Update</a><br>

     </form>
  </body>
</html>


