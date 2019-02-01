<?php
require 'vendor/autoload.php';

use Meena\loginform\user;
use Meena\loginform\DbConnect;

$conn_obj = new DbConnect();
$connection = $conn_obj->getConnection();
$stmt = "SELECT * FROM CandidateDB";
$query = mysqli_query($connection,$stmt);

//pagination
$limit = 2;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
  
$sql = "SELECT * FROM CandidateDB LIMIT $start_from, $limit";  
$rs_result = mysqli_query($connection, $sql);

//all records from database
while ( $row=$rs_result->fetch_assoc()):
  $id = $row['user_id'];
  $name = $row['cname'];
  $addr = $row['addr'];
  $email = $row['email'];
  $pass = $row['pass'];
echo "$id<br>$name<br>$addr<br>$email<br>$pass<br><br>";
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

