<?php 
session_start();
include("./sidebar.php");
?>

<link rel="stylesheet" href="./css/createRoom.css">

<section class="create-room">

    <div class="container" >
        
        <form action="backend/create.php" method="POST">
            <div class="mb-3">
            <label for="ChatRoom" class="form-label">ChatRoom Name</label>
            <input type="text" placeholder="Enter Room Name" class="form-control"  name="room">
            <button class="btn btn-outline-primary" href="#">Create Room</button>

        </form>
    </div>
</section>