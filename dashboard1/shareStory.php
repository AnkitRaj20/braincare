<?php 

include("../connection/config.php");

$fName = $_POST['firstName'];
$lName = $_POST['lastName'];
$topic = $_POST['topic'];
$message = $_POST['message'];

// echo $message;
$sql="INSERT INTO `stories` (`firstName`, `lastName`, `topic`, `message`, `date`) VALUES ( '$fName', '$lName', '$topic', '$message', current_timestamp())";

  if($conn->query($sql)===TRUE){
    echo "Account Created Successfully";
    header('location: ../dashboard/stories.php');
  }
  else{
    echo "Error" . $conn->error;
  }
?>