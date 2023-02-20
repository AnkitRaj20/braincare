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


     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./css/sidebar.css">
   <link rel="stylesheet" href="./css/user.css">
    </head>
<body>
  
<!-- <button class="hamburger"><i class='bx bx-menu'></i></button> -->
  <div class="sidebar mr-5">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus icon'></i>
        <div class="logo_name">dashboard</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
          <i class='bx bx-search' ></i>
         <input type="text" placeholder="Search...">
         <span class="tooltip">Search</span>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Dashboard</span>
        </a>
         <span class="tooltip">Dashboard</span>
      </li>
      <li>
       <a href="./user.php">
         <i class='bx bx-user' ></i>
         <span class="links_name">User</span>
       </a>
       <span class="tooltip">User</span>
     </li>
     <li>
       <a href="http://localhost/braincare/dashboard/room.php?roomname=GroupMessage">
         <i class='bx bx-chat' ></i>
         <span class="links_name">Chat</span>
       </a>
       <span class="tooltip">Chat</span>
     </li>
     <li>
       <a href="http://localhost/braincare/dashboard/room.php?roomname=student">
        
       <i class='bx bxs-graduation'></i>
         <span class="links_name">Student</span>
       </a>
       <span class="tooltip">Student</span>
     </li>
     <li>
       <a href="http://localhost/braincare/dashboard/room.php?roomname=boys">
        
       <i class='bx bx-male'></i>
         <span class="links_name">Boys</span>
       </a>
       <span class="tooltip">Boys</span>
     </li>
     <li>
       <a href="http://localhost/braincare/dashboard/room.php?roomname=girls">
        
       <i class='bx bx-female' ></i>
         <span class="links_name">Girls</span>
       </a>
       <span class="tooltip">Girls</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-pie-chart-alt-2' ></i>
         <span class="links_name">Analytics</span>
       </a>
       <span class="tooltip">Analytics</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-folder' ></i>
         <span class="links_name">File Manager</span>
       </a>
       <span class="tooltip">Files</span>
     </li>     
     <!-- <li>
       <a href="#">
         <i class='bx bx-cart-alt' ></i>
         <span class="links_name">Order</span>
       </a>
       <span class="tooltip">Order</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-heart' ></i>
         <span class="links_name">Saved</span>
       </a>
       <span class="tooltip">Saved</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-cog' ></i>
         <span class="links_name">Setting</span>
       </a>
       <span class="tooltip">Setting</span>
     </li> -->
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
  <!-- <section class="home-section">
      <div class="text">Dashboard</div>
  </section> -->
  <script>
//     const hamburger = document.querySelector(".hamburger");
// const navLinks = document.querySelector(".sidebar");

// hamburger.addEventListener("click", () => {
//   navLinks.classList.toggle("open");
// });

    
//     function logout(){
//       alert('Logged out');
//   <?php 
//     session_destroy();
//   ?>
//   window.location.href = "http://localhost/braincare/loginForm.php";
// }
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
