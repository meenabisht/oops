<?php
namespace Meena\loginform;
require 'vendor/autoload.php';
use Meena\loginform\user;
use Meena\loginform\DbConnect;

class Delete{
  public function deleteuser($id){
    $conn_obj = new DbConnect();
    $connection = $conn_obj->getConnection();  
    $del = "DELETE FROM CandidateDB WHERE user_id='$id'";
    $result = mysqli_query($connection, $del);
    $no_rows = mysqli_num_rows($result);
    if($no_rows == 0){
      echo"deleted the user";
    }else{
      echo"user is not deleted";
    }  
  }

  public function updateuser($id,$name,$email){
    $conn_obj = new DbConnect();
    $connection = $conn_obj->getConnection();
    $upd = "UPDATE CandidateDB SET cname='$name',email='$email' WHERE user_id='$id';";
    $result = mysqli_query($connection, $upd);
    $no_rows = mysqli_num_rows($result);
    if(!$no_rows == 0){
      echo"not updated the user";
    }else{
      echo"updated the user";
    } 
  }

  //filter the database record
  public function recordfilter($roles){
    $conn_obj = new DbConnect();
    $connection = $conn_obj->getConnection();
    $rl = "SELECT roles FROM CandidateDB WHERE roles='$roles'";
    print_r($rl);
    echo"<br/>";
    $result = mysqli_query($connection, $rl);
    var_dump($result);
    if($result->num_rows>0){
    $row=$result->fetch_assoc();
    return $row ;
    }
  }
}
?>

