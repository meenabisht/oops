<?php
namespace Meena\loginform\form;
session_start();
if( isset($_SESSION['login_user']) )
{
  echo "welcome".$_SESSION['login_user']."!";
}
?>
<html>
  <head></head>
  <body>
    <div>
     <button type="submit"><a href="logout.php">Logout</a></button>
    </div>
  </body>
</html>


