<?php
ob_start();
$roomname = $_GET['roomname'];
if ($_SESSION['isLoggedIn'] != 'login') {
    header('location: ../../login/loginForm.php');
}
$banner_text = "Create Room";
include("./Header/header.php");

// Connection
include("../../connection/config.php");

$id = $_SESSION['id'];

// Getting the url
$url =  $_SERVER['SERVER_NAME']. $_SERVER['REQUEST_URI'];

$purl = parse_url($url);
$q = $purl['query'];


$q1 = "roomname=".$_SESSION['gender'];




if($q == "roomname=boys" || $q == "roomname=girls" || $q == "roomname=others")
    {
        if($q !=$q1 ){
            $_SESSION['roomErr'] ="Cannot Access that room";
            header('location: ./createRoom.php');
          }
    }
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">ChatRoom - <?php echo $roomname; ?> </h4>
                        <p class="card-category">Chat With Your Friends</p>
                    </div>
                    <div class="msg">

                    
                        <div class="card-body">
                        <div data-bs-spy="scroll" data-bs-smooth-scroll="true" class=" scroll ">

                       
                        <div class="message">
                            <!-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTf-bO3uHEFkNpmTuytSRFBLu5pG3f0MTg-9g&usqp=CAU" alt="Avatar" style="width:100%;">
                            <p>Hello. How are you today?</p>
                            <span class="time-right">11:00</span> -->
                        </div>

                        <!-- <div class="message darker">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQKJ2nq_kCjAnFNypd6rm42wlBurO0TzAkZDQ&usqp=CAU" alt="Avatar" class="right" style="width:100%;">
                            <p>Hey! I'm fine. Thanks for asking!</p>
                            <span class="time-left">11:01</span>
                        </div> -->

                    </div>
                        <div class="col-md-12 mt-4">
                            <div class="form-group">
                          <label class="bmd-label-floating">Type Your Message</label>
                          <input  type="text" name="message" id="message"  class="form-control" required>
                          </div>
                        <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Send</button>
                        
                    </div>
                </div>
                </div>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->

<script type="text/javascript">

     // ======Check for new msg every 1 second======
     setInterval(runFunction,1000);

    function runFunction(){
         $.post("./Message/htcont.php", { room : '<?php echo $roomname ?>'},
         function(data,status){
         document.getElementsByClassName("scroll")[0].innerHTML=data;
        }
     )
    }
//  =============  After clicking the send button====================
        $("#submit").click(function(){      
            //    If user sends the msg
            var clientmsg=$('#message').val();
             // Clearing the input field
            $('#message').val('');
            $.post("./Message/postmsg.php",
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


    //============== Enter to submit========
    // Get the input field
    var input = document.getElementById("message");

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
</script>

<?php
include("./Footer/footer.php");
?>

