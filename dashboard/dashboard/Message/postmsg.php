<?php 
// connection
include "../../../connection/config.php";

$msg=$_POST['text'];
$room=$_POST['room'];
$ip=$_POST['ip'];
$name=$_POST['name'];
echo $name;
echo $msg;

$sql="INSERT INTO `msgs` ( `msg`, `room`,`name`, `ip`, `stime`) VALUES ('$msg', '$room','$name', '$ip', current_timestamp())";

echo $sql;

mysqli_query($conn,$sql);

// Close the connection
mysqli_close($conn);
?>