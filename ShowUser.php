<!DOCTYPE html>
<html>
  <head></head>
  <body>   
    <form action=" " method="post">
    Roles:<br><select name="roles">
        <option value="admin">admin</option>
        <option value="teachers">teachers</option>
        <option value="students">students</option>
      </select>
      <input type="submit" name="filter" value="filter"><br><br>
    </form>
  </body>
</html>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'vendor/autoload.php';

use Meena\loginform\user;
use Meena\loginform\DbConnect;
use Meena\loginform\Delete;

$conn_obj = new DbConnect();
$connection = $conn_obj->getConnection();
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $del_obj=new Delete();
  $obj = $del_obj->recordfilter($_POST['roles']);
  // var_dump($obj);
  // echo"<br/>";
  // ECHO"meena";
  if($obj > 0){   
    // echo"HELLO MEENA HOW ARE YOU";
    if (isset($_POST['filter'])) {
      $sql = "SELECT * FROM CandidateDB";
      // var_dump($sql);
      $search_term = mysqli_real_escape_string($connection,$_POST['roles']);
      // var_dump($search_term);
      $sql .= "WHERE roles LIKE '%".$search_term."%'";
      // var_dump("WHERE roles LIKE '%".$search_term."%'");
      while ($row=$sql->fetch_assoc()):
        $id = $row['user_id'];
        $name = $row['cname'];
        $addr = $row['addr'];
        $email = $row['email'];
        $roles = $row['roles'];
      echo "$id<br>$name<br>$addr<br>$email<br>$roles<br><br>";
      endwhile;
  }

  }
}

//pagination
$limit = 2;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
  
$sql = "SELECT * FROM CandidateDB LIMIT $start_from, $limit";  
$rs_result = mysqli_query($connection, $sql);

//all records from database
while ($row=$rs_result->fetch_assoc()):
  $id = $row['user_id'];
  $name = $row['cname'];
  $addr = $row['addr'];
  $email = $row['email'];
  $roles = $row['roles'];
echo "$id<br>$name<br>$addr<br>$email<br>$roles<br><br>";
endwhile;
$sql = "SELECT COUNT(*) as total FROM CandidateDB";  

$rs_result = mysqli_query($connection, $sql);  

if($rs_result->num_rows>0)
{
  $row=$rs_result->fetch_assoc();
  $total_records=$row['total'];
  $total_pages = ceil($total_records / $limit);  
  $pagLink = "<div>";  
  for ($i=1; $i<=$total_pages; $i++) {  
  $pagLink .= "<a href='ShowUser.php?page=".$i."'>".$i."</a>";  
};  
echo $pagLink . "</div>";
}
?>

