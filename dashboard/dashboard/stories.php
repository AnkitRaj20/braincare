<?php
session_start();
ob_start();

if ($_SESSION['isLoggedIn'] != 'login') {
    header('location: ../../login/loginForm.php');
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
                        $sql = "SELECT * FROM stories";
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
                </div>
            </div>

        </div>
    </div>
</div>



<script type="text/javascript">
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
</script>

<?php
include("./Footer/footer.php");
?>