<?php 
session_start();
// Connection
include "../../../connection/config.php";
 $room = $_POST['room'];

 $sql ="SELECT * FROM msgs WHERE room='$room'";
 $id = $_SESSION['id'];

 $res="";
 $result=mysqli_query($conn,$sql);

 if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        $name = $row['name'];
        $newDate = date("d-m-Y", strtotime($row['stime']));

        if($name == $_SESSION['name']){
            $res= $res . '<div class="message darker">';
            // $res = $res . $row['ip'];
            $res = $res . $name;
            $res = $res ." <p>". $row['msg'];
            $res = $res ." </p><span class='time-right'>" . $newDate . "</span></div>";
        }
        else{
            $res= $res . '<div class="message">';
            // $res = $res . $row['ip'];
            $res = $res . $name;
            $res = $res ."  <p>". $row['msg'];
            $res = $res ." </p><span class='time-right'>" . $newDate . "</span></div>";
        }
       

    }
 }

 echo $res;
?>