<?php 
// Connection
include "../../../connection/config.php";
 $room = $_POST['room'];

 $sql ="SELECT msg,room,ip,stime FROM msgs WHERE room='$room'";

 $res="";
 $result=mysqli_query($conn,$sql);

 if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        $newDate = date("d-m-Y", strtotime($row['stime']));
        $res= $res . '<div class="message">';
        $res = $res . $row['ip'];
        $res = $res ." says <p>". $row['msg'];
        $res = $res ." </p><span class='time-right'>" . $newDate . "</span></div>";

    }
 }

 echo $res;
?>