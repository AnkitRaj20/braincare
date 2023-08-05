<?php
session_start();
ob_start();

$start = $_GET['start'];
echo $start;

if ($_SESSION['isLoggedIn'] != 'login') {
    header('location: ../../loginForm.php');
}
$banner_text = "Inspiring Stories";
include("./Header/header.php");

// Connection
include("../../connection/config.php");

$id = $_SESSION['id'];
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Stories</h4>
                        <p class="card-category">View Inspiring Stories</p>
                    </div>
                    <div class="card-body">
                        <?php
                       
                        
                        $data = 5;

                        $sql = "SELECT * FROM stories ORDER BY id DESC LIMIT $start,$data ";
                        $result = mysqli_query($conn, $sql);
                        $num = mysqli_num_rows($result);
                    
                        
                        if ($num > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                $name = $row['firstName'] . " " . $row['middleName'] . " " . $row['lastName'];
                        ?>
                                <script>
                                    var newDate = new Date("<?php echo $row['date'] ?>");
                                    var nd = newDate.toDateString();
                                </script>

                                <div class="card mt-2">
                                    <div class="card-header topic">
                                        <b>
                                        <?php echo $row['topic'] ?>
                                        <?php echo $row['id'] ?>
                                        </b>
                                    </div>
                                    <div class="card-body">
                                        <blockquote class="blockquote mb-0">
                                            <p><?php echo $row['message'] ?></p>
                                            <footer class="blockquote-footer">By <cite title="Source Title"> <?php echo $name; ?> </cite></footer>
                                            <footer class="blockquote-footer">
                                                <?php
                                                 echo "<script>document.writeln(nd);</script>"; ?>
                                            </footer>
                                        </blockquote>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>

                    <?php 
                    $sql = "SELECT * FROM stories";
                    $result = mysqli_query($conn, $sql);
                    $num10 = mysqli_num_rows($result);

                    // echo $num10;

                    $value = $start + $data;
                    $prev_val = $start - $data;
                    // echo $value;
                    
                        ?>
                        <div class="col-md-12">

                            <button type="button" onclick=next()  id="btn" value="Next" class="btn  btn-primary pull-right">Next</button>
                        <!-- </div>
                        <div class="col-md-4"> -->

                            <button type="button" onclick=prev()  id="prev"  class="btn  btn-primary pull-right">Prev</button>
                        </div>
                            
                   
                <!-- <a href="./stories.php/?$start=.$value"  id="next" name="next" class="btn btn-primary pull-right">Next</a> -->
                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function next(){
        console.log("clicked");
        const value="<?php echo $value; ?>";
        const num10="<?php echo $num10; ?>";
        // window.location.href("http://localhost/braincare/dashboard/dashboard/stories.php?start=10")
        const btn = document.getElementById('btn');

        console.log("value"+value)
        console.log("temp"+num10)

        if(value == 5){
            // alert("ok")
            document.getElementById("btn").disabled = false;
        }else if(value < num10){
                // alert("small"+value+" "+num10)
            document.getElementById("btn").disabled = false;
        }

        else{
            // alert("big"+value+" "+num10 )
            document.getElementById("btn").disabled = true;
        }


btn.addEventListener('click', function onClick() {
  // ⛔️ TypeError: window.location.href is not a function
  window.location.assign('http://localhost/braincare/dashboard/dashboard/stories.php?start='+value);
});
    }

    // Prev button

    function prev(){
        const prev_btn = document.getElementById('prev');
        const prev_val="<?php echo $prev_val; ?>";
        const start="<?php echo $start; ?>";
        const num10="<?php echo $num10; ?>";

        if(start == 0){
            // alert("ok")
            document.getElementById("prev").disabled = true;
        }else if(prev_val < num10){
                // alert("small"+prev_val+" "+num10)
            document.getElementById("prev").disabled = false;
        }

        else{
            // alert("big"+prev_val+" "+num10 )
            document.getElementById("prev").disabled = false;
        }


        prev_btn.addEventListener('click', function onClick() {
  // ⛔️ TypeError: window.location.href is not a function
  window.location.assign('http://localhost/braincare/dashboard/dashboard/stories.php?start='+prev_val);
});

    }
</script>


<!-- <script type="text/javascript">
    $(document).ready(function() {
        $('#roomSpan').hide();

        var room_err = false;

        $('#room').keyup(function() {
            roomName_check();
        });

        function roomName_check() {
            var value = $('#room').val();

            if (value.length == '') {
                $('#roomSpan').show();
                $('#roomSpan').html('Please enter room name');
                $('#roomSpan').focus();
                $('#roomSpan').css("color", "red");
                $('#roomSpan').css("border-color", "red");

                room_err = true;
                return false;
            } else if (value.length < 2 || value.length > 30) {
                $('#roomSpan').show();
                $('#roomSpan').html('Please Choose an name between 2 to 30 characters.');
                $('#roomSpan').focus();
                $('#roomSpan').css("color", "red");
                $('#roomSpan').css("border-color", "red");

                room_err = true;
                return false;
            } else {
                $('#roomSpan').hide();
                $('#roomSpan').css("border-color", "");
            }
        }

        $('#submit').click(function() {
            room_err = false;

            roomName_check();

            if (room_err == false) {
                return true;
            } else {
                return false;
            }
        })
    })
</script> -->

<?php
include("./Footer/footer.php");
?>