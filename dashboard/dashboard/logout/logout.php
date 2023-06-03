<?php 
session_start();
ob_start();
 session_destroy();

 header('location: http://localhost/braincare/loginForm.php');
?>