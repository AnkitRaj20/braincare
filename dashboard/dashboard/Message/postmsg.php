<?php 
// connection
include "../../../connection/config.php";

$msg=$_POST['text'];
$room=$_POST['room'];
$ip=$_POST['ip'];

echo $msg;

$sql="INSERT INTO `msgs` ( `msg`, `room`, `ip`, `stime`) VALUES ('$msg', '$room', '$ip', current_timestamp())";

echo $sql;

mysqli_query($conn,$sql);

// Close the connection
mysqli_close($conn);
?>