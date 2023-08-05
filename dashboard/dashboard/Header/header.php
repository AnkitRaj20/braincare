<?php
// session_start();
// Connection
include("../../connection/config.php");
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

       // if localhost  then,going to  braincare path  . If in server, then the given server path it will choose in the else part
            if ($_SERVER['SERVER_NAME'] === "localhost") {
            $dir_path = '/braincare';
           } else {
          $dir_path = '';
        }
    
      $url =  $_SERVER['SERVER_NAME']. $_SERVER['REQUEST_URI'];
      // echo $url;
      $id = $_SESSION['id'];
      
    $sql= "SELECT * FROM register where id= $id";
    // echo $sql;
    $result= mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if($num === 1){
      while($row = mysqli_fetch_assoc($result)){
          $userType = $row['userType'];
          $gender = $row['gender'];
          $occupation = $row['occupation'];
          $_SESSION['name'] = $row['firstName']." ".$row['middleName']." ".$row['lastName'];
         
      }
    }

  
//     if($url == $_SERVER['SERVER_NAME']."/dashboard/dashboard/room.php?roomname=boys" && $_SESSION['gender'] ==='male' )
//     {
//       echo "working";
//       header("location:  $_SERVER[SERVER_NAME].'/dashboard/dashboard/room.php?roomname=girls'");
//     }
// else{
//   echo "not working";
// }
    
?>
      
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <!-- <link rel="icon" type="image/png" href="<?php echo $actual_link . $dir_path . '/images/logo1.png'; ?>"> -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    BrainCare
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />

  <!-- Message CSS -->
  <link href="../assets/css/message.css" rel="stylesheet" />
  <link href="../assets/css/stories.css" rel="stylesheet" />
  <!-- <link rel="stylesheet" href="../../assets/css/message.css"> -->

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />

  

  <!-- JQUERY -->
  <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>


  <!-- DataTables -->
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"> -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">

  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="<?php echo $actual_link . $dir_path . '/index.php'; ?>" class="simple-text logo-normal">
        <!-- <img src="<?php echo $actual_link . $dir_path . '/images/logo1.png'; ?>" width="30" height="30" alt="logo"> -->
          BrainCare
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <!-- <li class="nav-item  ">
            <a class="nav-link" href="./dashboard.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li> -->
          <!-- <li class="nav-item active "> -->
          <li class="nav-item">
            <a class="nav-link" href="./user.php">
              <i class="material-icons">person</i>
              <p>User Profile</p>
            </a>
          </li>

          <?php if($userType === 'admin'){ ?>
          <li class="nav-item ">
            <a class="nav-link" href="./allUsers.php">
              <i class="material-icons">content_paste</i>
              <p>All Users</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./allMessages.php">
              <i class="material-icons">forum</i>
              <p>Feedback/Contact Messages</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./createRoom.php">
              <i class="material-icons">home</i>
              <p>Create Room </p>
            </a>
          </li>

          <?php } ?>

          <li class="nav-item ">
            <a class="nav-link" href="http://localhost/braincare/dashboard/dashboard/room.php?roomname=all">
              <i class="material-icons">chat</i>
              <p>Group Chat </p>
            </a>
          </li>
          <?php if($occupation == 'student') { ?>
          <li class="nav-item ">
            <a class="nav-link" href="http://localhost/braincare/dashboard/dashboard/room.php?roomname=student">
              <i class="material-icons">school</i>
              <p>Student </p>
            </a>
          </li>
          <?php  } 
            if($gender == 'boys'){
          
          ?>
          <li class="nav-item ">
            <a class="nav-link" href="http://localhost/braincare/dashboard/dashboard/room.php?roomname=boys">
              <i class="material-icons">boys</i>
              <p>Boys</p>
            </a>
          </li>
          <?php } 
          if($gender == 'girls'){
          ?>
          <li class="nav-item ">
            <a class="nav-link" href="http://localhost/braincare/dashboard/dashboard/room.php?roomname=girls">
              <i class="material-icons">girls</i>
              <p>Girls</p>
            </a>
          </li>
          <?php }  
            if($gender == 'others'){
          ?>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/braincare/dashboard/dashboard/room.php?roomname=transgender">
              <i class="material-icons">transgender</i>
              <p>Transgender</p>
            </a>
          </li>
          <?php } ?>

          <li class="nav-item ">
            <a class="nav-link" href="./shareStory.php">
              <i class="material-icons">create</i>
              <p>Share Stories</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="http://localhost/braincare/dashboard/dashboard/stories.php?start=0">
              <i class="material-icons">book</i>
              <p>Stories</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./createMeeting.php">
              <i class="material-icons">event</i>
              <p>Create Events</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./viewMeeting.php">
              <i class="material-icons">links</i>
              <p>Join Events</p>
            </a>
          </li>
          
          <!-- <li class="nav-item ">
            <a class="nav-link" href="./typography.php">
              <i class="material-icons">library_books</i>
              <p>Typography</p>
            </a>
          </li> -->
          
          
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo $actual_link . $dir_path . '/dashboard/dashboard/logout/logout.php'; ?>">
              <i class="material-icons">logout</i>
              <p>Log Out</p>
            </a>
          </li>  
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">
              <?php 
                echo $banner_text;
              ?>
            </a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <!-- <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form> -->
            <ul class="navbar-nav">
              <!-- <li class="nav-item">
                <a class="nav-link" href="javascript:;">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li> -->
              <!-- <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li> -->
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="<?php echo $actual_link . $dir_path . '/dashboard/dashboard/user.php'; ?>">Profile</a>
                  
                  <!-- <a class="dropdown-item" href="#">Settings</a> -->
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?php echo $actual_link . $dir_path . '/dashboard/dashboard/logout/logout.php'; ?>">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->