<?php 
session_start();
include("./sidebar.php");

// If Not logged in
if($_SESSION['isLoggedIn'] != 'login'){
    ?>
        <script>
            window.location.href="../loginForm.php";
        </script>
    <?php
}
?>


<h2 class="mt-5">Chat</h2>

<section class="container">

    <div class="container">
        <div class="scroll">
            <!-- <img src="/w3images/bandmember.jpg" alt="Avatar" style="width:100%;">
  <p>Hello. How are you today?</p>
  <span class="time-right">11:00</span>
-->
</div>
    

</div>
<input type="text" class="form-control " name="msg" id="msg" placeholder="Enter Your Message">

<button type="button" class="btn btn-primary mt-3" name="submit" id="submit">Send</button>
</section>


<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>