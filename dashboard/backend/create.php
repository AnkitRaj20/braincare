<?php
$room = $_POST['room'];

if (strlen($room) > 30 || strlen($room) < 2) {
?>
    <script>
        alert("Please Choose an name between 2 to 30 characters.");
        window.location.href = 'http://localhost/braincare/dashboard/createRoom.php';
    </script>
<?php
} else {

    include("../../connection/config.php");

$sql = "SELECT * FROM rooms WHERE name='$room'";

$result=mysqli_query($conn,$sql);

if($result){

$count = mysqli_num_rows($result);

if (mysqli_num_rows($result) > 0) {
?>
    <script>
        alert("This room name is not available.Please choose different room");
        window.location.href = 'http://localhost/braincare/dashboard/createRoom.php';
    </script>
    <?php
} else {

    $sql = "INSERT INTO `rooms` (`name`, `time`) VALUES ( '$room', CURRENT_TIMESTAMP)";

    if (mysqli_query($conn, $sql)) {
        $message = "Your room is ready.Chat now";
        echo $message;
        echo '<script language="javascript">';
        echo 'alert("'.$message.'");';
        echo 'window.location.href="http://localhost/braincare/dashboard/room.php?roomname='.$room.'"';
        echo '</script>';
    } else {
        ?>
        <script>
            alert("Your room is not ready.Please try again later");
            window.location.href = 'http://localhost/braincare/dashboard/createRoom.php';
        </script>
<?php
    }
}
}
else{
    echo "error" . mysqli_error($conn);
}
}

?>