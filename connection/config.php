<?php
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