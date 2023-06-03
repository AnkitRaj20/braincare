<?php 
// connection
include "../connection/config.php";

$roomname=$_GET['roomname'];

$sql="SELECT * FROM `rooms` WHERE `name` = '$roomname'";

$result = mysqli_query($conn,$sql);

if($result){
    //Check if room exits
    if(mysqli_num_rows($result)==0) {
        ?>
        <script>
            alert("This room does not exist. Please create a new one.");
            window.location.href = 'http://localhost/braincare/dashboard/createRoom.php';
        </script>
        <?php
    }   
        // Chat room
    else{
    }
}else{
    echo "ERROR:".mysqli_error($conn);
}


include("./grpMsg.php");
?>