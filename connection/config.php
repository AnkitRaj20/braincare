<?php
// $servername = "bwzjk0lngsyrgtm0fjdy-mysql.services.clever-cloud.com";
// $username = "uc6nyiamyftuq7ll";
// $password = "F7cBKFwYXSVcoDz1O4Tr";
// $dbname = "bwzjk0lngsyrgtm0fjdy";


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "braincare";

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die("Connection Failed:".$conn->connect_error);
}
// echo "Connection Successful."

?>
