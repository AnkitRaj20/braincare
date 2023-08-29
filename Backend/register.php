<?php
//Connection
include("../connection/config.php");
session_start();

$getPassword = $_POST['password'];
$email = $_POST['email'];

$files = $_FILES['file'];
print_r($files['size']);

$filename = $files['name'];
$fileerror = $files['error'];
$filetmp = $files['tmp_name'];

$fileext = explode('.', $filename);
$filecheck = strtolower(end($fileext));

$fileextstored = array('png', 'jpg', 'jpeg');

// Password hashing using bcrypt
$pass = password_hash($getPassword, PASSWORD_BCRYPT);


$emailQuery = "SELECT * from register where email = '$email'";
$query = mysqli_query($conn, $emailQuery);
$emailCount = mysqli_num_rows($query);


if ($emailCount > 0) {
?>
  <script>
    location.replace("../registerForm.php");
    alert('Email already registered');
  </script>
<?php
} else {
  if($files['size'] !=0){

  if(in_array($filecheck, $fileextstored)){
    
    $destinationfile =  'upload/'.$filename;
    move_uploaded_file($filetmp,$destinationfile);
  

  $sql = "INSERT INTO `register` (`image`,`firstName`, `middleName`, `lastName`, `mobile`, `email`,`gender`,`occupation`, `addr`, `street`, `city`, `state`, `pin`, `password`, `regDate`,`userType`) VALUES ('$destinationfile','$_POST[firstName]','$_POST[middleName]','$_POST[lastName]','$_POST[mobile]','$_POST[email]','$_POST[gender]','$_POST[occupation]','$_POST[address]','$_POST[street]','$_POST[city]','$_POST[state]','$_POST[pin]','$pass', current_timestamp(),'user');";

  if ($conn->query($sql) === TRUE) {
    $_SESSION['isLoggedIn'] = 'login' ;
                $last_id = mysqli_insert_id($conn);
                $_SESSION['id'] = $last_id;
                $_SESSION['email'] = $_POST['email'];
    echo "Account Created Successfully";
    header('location: ../dashboard/dashboard/user.php');
  } else {
    echo "Error" . $conn->error;
  }
} else{

}
  }
  else{
    $sql = "INSERT INTO `register` (`image`,`firstName`, `middleName`, `lastName`, `mobile`, `email`,`gender`,`occupation`, `addr`, `street`, `city`, `state`, `pin`, `password`, `regDate`,`userType`) VALUES ('','$_POST[firstName]','$_POST[middleName]','$_POST[lastName]','$_POST[mobile]','$_POST[email]','$_POST[gender]','$_POST[occupation]','$_POST[address]','$_POST[street]','$_POST[city]','$_POST[state]','$_POST[pin]','$pass', current_timestamp(),'user');";

    if ($conn->query($sql) === TRUE) {
      $_SESSION['isLoggedIn'] = 'login' ;
                  $last_id = mysqli_insert_id($conn);
                  $_SESSION['id'] = $last_id;
                  $_SESSION['email'] = $_POST['email'];
      echo "Account Created Successfully";
      header('location: ../dashboard/dashboard/user.php');
    } else {
      echo "Error" . $conn->error;
    }
  }
}

$conn->close();
?>