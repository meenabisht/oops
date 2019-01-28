<?php
namespace Meena\loginform\form;
session_start();
if(session_destroy())
{
header("Location: login.php");
}
?>