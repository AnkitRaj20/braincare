<?php 
 include("./sidebar.php");
?>

<link rel="stylesheet" href="./css/grpChat.css">

<h2>Chat Messages - <?php echo $roomname; ?> </h2>

<style>
    .container{
        background-color: #11101D;
        color: #fff;
        overflow: hidden;
    }
</style>
<section class="grp">


<div class="container">
    <div 
   
     data-bs-spy="scroll"   data-bs-smooth-scroll="true" class="scroll" >
<!-- <img src="/w3images/bandmember.jpg" alt="Avatar" style="width:100%;">
  <p>Hello. How are you today?</p>
  <span class="time-right">11:00</span> -->
 
</div>
    
</div>

<input type="text" class="form-control " name="msg" id="msg" placeholder="Enter Your Message">

<button type="button" class="btn btn-primary mt-3" name="submit" id="submit">Send</button>

</section>

<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<script type="text/javascript">
    // Check for new msg every 1 second
    setInterval(runFunction,1000);

    function runFunction(){
       $.post("htcont.php", { room : '<?php echo $roomname ?>'},
       function(data,status){
        document.getElementsByClassName("scroll")[0].innerHTML=data;
       }
       )
    }


    // Enter to submit
    // Get the input field
var input = document.getElementById("msg");

// Execute a function when the user presses a key on the keyboard
input.addEventListener("keypress", function(event) {
  // If the user presses the "Enter" key on the keyboard
  if (event.key === "Enter") {
    // Cancel the default action, if needed
    event.preventDefault();
    // Trigger the button element with a click
    document.getElementById("submit").click();
  }
});
    
    $("#submit").click(function(){
      
    //    If user sends the msg
        var clientmsg=$('#msg').val();
        console.log("first",clientmsg)
         // Clearing the input field
         $('#msg').val('');
        $.post(
            "postmsg.php",
            {
                text: clientmsg,
                room: '<?php echo $roomname ?>',
                ip: "<?php echo $_SERVER['REMOTE_ADDR'] ?>"
            }),

        function(data,status){
            document.getElementsByClassName('scroll')[0].innerHTML=data;
           
        }
        return false;
    });
</script>
