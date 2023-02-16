<?php
//Connection
include("../connection/config.php");


$sql="INSERT INTO `register` (`firstName`, `middleName`, `lastName`, `mobile`, `email`,`gender`,`occupation`, `addr`, `street`, `city`, `state`, `pin`, `password`, `regDate`) VALUES ('$_POST[firstName]','$_POST[middleName]','$_POST[lastName]','$_POST[mobile]','$_POST[email]','$_POST[gender]','$_POST[occupation]','$_POST[address]','$_POST[street]','$_POST[city]','$_POST[state]','$_POST[pin]','$_POST[password]', current_timestamp());";

  if($conn->query($sql)===TRUE){
    echo "Account Created Successfully";
    header('location: ../dashboard/user.php');
  }
  else{
    echo "Error" . $conn->error;
  }

  $conn->close();
?>