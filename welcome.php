<?php

require 'vendor/autoload.php';
error_reporting(E_ALL);
ini_set('display_errors', '1');
use Meena\loginform\user;
use Meena\loginform\DbConnect;
use Meena\loginform\Delete;

session_start();
if(isset($_SESSION['login_user']))
{ 
  echo "welcome".$_SESSION['login_user']."!";
  echo"<br>";
}
?>

<html>
  <head></head>
  <body>
      <form action="" method="POST">
     <button type="submit"><a href="logout.php">Logout</a></button><br>
     </form>
  </body>
</html>


