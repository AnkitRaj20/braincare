<?php 
include("./api.php");
include("./config.php");


include("../../connection/config.php");

$for=$_POST['for'];
$topic=$_POST['topic'];
$duration=$_POST['duration'];
$date=$_POST['date'];
$password=$_POST['password'];

$arr['for']=$for;
$arr['topic']=$topic;
$arr['start_date']=date('Y-m-d h:i:s',strtotime($date));
$arr['password']=$password;
// 2 for schedule meeting
$arr['type'] = '2';

$result = createMeeting($arr);

$data = json_encode($result);
echo($data);

if(isset($result->id)){
    $url = $result->join_url;
    $time = $result->duration;
    $pass=$result->password;
    $start=$result->start_time;

    echo $for;

    echo '<Pre>';
    echo "Topic".$result->topic."<br/>";
    // echo "For".$result->for."<br/>";
    echo "Join URL:".$result->join_url."<br/>";
    echo "Duration:".$result->duration."<br/>";
    echo "Password:".$result->password."<br/>";
    echo "Date".$result->start_time."<br/>";
}
 else{
    echo "<Pre>";
    print_r($data);
 }


 $sql="INSERT INTO `meetings` (`usedFor`, `topic`, `url`, `duration`, `password`, `date`) VALUES ('$for', '$topic', '$url', '$time', '$pass', '$start');";

 echo $sql;

//  mysqli_query($conn, $sql);


  if ($result = mysqli_query($conn, $sql)) {
    echo "Returned rows are: " . mysqli_num_rows($result);
    ?>
    <script>
        console.log("working");
        alert("working");
    </script>
    <?php
    // Free result set
    // mysqli_free_result($result);
  }

  

?>