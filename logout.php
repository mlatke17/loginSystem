<?php 

session_start();
//unsets all the variables which have been set earlier
session_unset();
//delete the sesssion which has been created earlier 
session_destroy();

header("location: login.php");
exit;


?>