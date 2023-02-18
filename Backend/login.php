<?php 
//Connection
include("../connection/config.php");

session_start();

$email= $_POST['email'];

$sql = "SELECT * FROM `register` WHERE email = '$email'";

$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);



if($num==1){
     while($row=mysqli_fetch_array($result)){
    if(mysqli_num_rows($result)>0){
        $_SESSION['isLoggedIn'] = 'login';

        // Fetching id and email from db
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        header('location: ../dashboard/user.php');

    }
 }
}else{
    echo " error". mysqli_error($conn);
}

?>