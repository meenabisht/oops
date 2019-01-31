<?php
namespace Meena\loginform;
require 'vendor/autoload.php';
use Meena\loginform\DbConnect;

interface LoginRegistration{
    public function userlogin($emailusername, $pass);
    public function userregister($name,$addr,$email,$pass,$mobno,$high_qual,$role);  
}
?>