<?php 
//  if(!isset($_SESSION)) 
//  { 
//    session_start(); 
// }

session_start();
//  connection
include("../connection/config.php");

// If Not logged in
$id = $_SESSION['id'];

$sql = "SELECT * FROM `register` WHERE id= $id";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);

if($num>0){
  while($row=mysqli_fetch_array($result)){
    $gender = $row['gender'];
    $occupation = $row['occupation'];
    $_SESSION['name'] = $row['firstName']." ".$row['middleName']." ".$row['lastName'];
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> 

<title>BrainCare</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./css/sidebar.css">
   <link rel="stylesheet" href="./css/style.css">
   <link rel="stylesheet" href="./css/user.css">
    </head>

    <style>
      *{
        margin: 0;
padding: 0;  
box-sizing: border-box;    

}
    </style>
<body>
  
<?php 
// include('./header/side.php');
?>
<!-- <button class="hamburger"><i class='bx bx-menu'></i></button> -->
  <div class="sidebar mr-5">
    <div class="logo-details">
      <i class='bx bx-brain icon'></i>
        <div class="logo_name">BrainCare</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
          <!-- <i class='bx bx-search' ></i> -->
         <!-- <input type="text" placeholder="Search...">
         <span class="tooltip">Search</span> -->
      </li>
      <li>
        <!-- <a href="#">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Dashboard</span>
        </a>
         <span class="tooltip">Dashboard</span>
      </li> -->
      <li>
       <a href="./user.php">
         <i class='bx bx-user' ></i>
         <span class="links_name">User</span>
       </a>
       <span class="tooltip">User</span>
     </li>
     <li>
       <a href="http://localhost/braincare/dashboard/room.php?roomname=all">
         <i class='bx bx-chat' ></i>
         <span class="links_name">Chat</span>
       </a>
       <span class="tooltip">Chat</span>
     </li>
     <?php 
      if($occupation === 'student'){      
     ?>
     <li>
       <a href="http://localhost/braincare/dashboard/room.php?roomname=student">
        
       <i class='bx bxs-graduation'></i>
         <span class="links_name">Student</span>
       </a>
       <span class="tooltip">Student</span>
     </li>
     <?php 
     }

     if($gender === 'male'){
     ?>
     <li>
       <a href="http://localhost/braincare/dashboard/room.php?roomname=boys">
        
       <i class='bx bx-male'></i>
         <span class="links_name">Boys</span>
       </a>
       <span class="tooltip">Boys</span>
     </li>
     <?php 
     }
     if($gender === 'female'){

     ?>
     <li>
       <a href="http://localhost/braincare/dashboard/room.php?roomname=girls">
        
       <i class='bx bx-female' ></i>
         <span class="links_name">Girls</span>
       </a>
       <span class="tooltip">Girls</span>
     </li>
     <?php 
     }
     if($gender === 'transgender'){
     ?>
     <li>
       <a href="http://localhost/braincare/dashboard/room.php?roomname=transgender">
        
       <i class='bx bx-body'></i>
         <span class="links_name">Transgender</span>
       </a>
       <span class="tooltip">Transgender</span>
     </li>
     <?php 
     }
     ?>
     <li>
       <a href="./stories.php">
         <i class='bx bx-book' ></i>
         <span class="links_name">Stories</span>
       </a>
       <span class="tooltip">Stories</span>
     </li>
     <li>
       <a href="./events.php">
       <i class='bx bx-video-recording' ></i>
         <span class="links_name">Create Events</span>
       </a>
       <span class="tooltip">Create Events</span>
     </li>         
     <li>
       <a href="./showLink.php">
       <i class='bx bx-video-recording' ></i>
         <span class="links_name">join Events</span>
       </a>
       <span class="tooltip">join Events</span>
     </li>         
     <li class="profile">
         <div class="profile-details">
           <!--<img src="profile.jpg" alt="profileImg">-->
           <div class="name_job">
             <div class="name">Log Out</div>
             <div class="job">BrainCare</div>
           </div>
         </div>
         <a href="./logout.php"><i class='bx bx-log-out' id="log_out" style="cursor:pointer">
         </i></a>
         
     </li>
    </ul>
  </div>
  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });

  searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
  });

  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
   }
  }
  </script>
</body>
</html>
