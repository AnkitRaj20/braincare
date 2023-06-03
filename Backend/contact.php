<?php 
// Connection
include("../connection/config.php");

// Insert Query
$sql = "INSERT  INTO contact(name, email, subject, message)
VALUES('$_POST[name]','$_POST[email]','$_POST[subject]','$_POST[message]')";

if($conn -> query($sql) === true){
    echo "message sent successfully";
    header('location: ../contact.php');
}
else{
    echo "message not sent::Reason:->".$conn->error;
}
?>