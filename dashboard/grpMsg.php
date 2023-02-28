<?php 
 include("./sidebar.php");

 include("../connection/config.php");

    $sql = "SELECT * FROM meetings where usedFor='$roomname';";
  $result = $conn->query($sql);
  $num = mysqli_num_rows($result);
?>

<link rel="stylesheet" href="./css/grpChat.css">

<style>
    .container{
        background-color: #11101D;
    color: #fff;
    overflow: hidden;
    }
</style>

<h2>Chat Messages - <?php echo $roomname; ?> </h2>

<section class="row">
    <div class="col-md-7">
<div class="container">
    <div data-bs-spy="scroll"   data-bs-smooth-scroll="true" class="scroll chat" >
<!-- <img src="/w3images/bandmember.jpg" alt="Avatar" style="width:100%;">
  <p>Hello. How are you today?</p>
  <span class="time-right">11:00</span> -->
  </div>
</div>  

<input type="text" class="form-control " name="msg" id="msg" placeholder="Enter Your Message">

<button type="button" class="btn btn-primary mt-3" name="submit" id="submit">Send</button>

</div>

<div class="col-md-5">
    <h3 class="text-center">Meeting Links</h3>
<div class="link">
<table class="table table-hover m-5">
  <thead>
    <tr class="text-center">
      <th scope="col">Topic</th>
      <th scope="col">URL</th>
      <th scope="col">Password</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      if($num>0){

      while($row=mysqli_fetch_array($result)){

      
    ?>
    <script>
        var newDate = new Date("<?php echo $row['date'] ?>");
        var nd = newDate.toDateString();

    </script>
    <tr>
      <th scope="row"> <?php echo $row['topic']; ?> </th>
      <td> <a href="<?php echo $row['url']; ?>"><?php echo $row['url']; ?></td>
      </a> 
      <td><?php echo $row['password']; ?></td>
      <td><?php
   echo "<script>document.writeln(nd);</script>";
?>
</td>
    </tr>
    
    <?php 
      }
      }
    ?>
  </tbody>
</table>
</div>
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
