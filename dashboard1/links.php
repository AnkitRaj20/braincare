<?php
// session_start();
include("./sidebar.php");

include("../connection/config.php");

$roomname = $_SESSION['roomname'];
$sql = "SELECT * FROM meetings where usedFor='$roomname';";
$result = $conn->query($sql);
$num = mysqli_num_rows($result);
?>


<div class="row">
    <div class="container">
        <div class="col-md-10">
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
            </div>
        </div>

        <?php
        if ($num > 0) {

            while ($row = mysqli_fetch_array($result)) {


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