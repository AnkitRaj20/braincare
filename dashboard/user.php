<?php
session_start();
include("./sidebar.php");
include("../connection/config.php");

// If Not logged in
if($_SESSION['isLoggedIn'] != 'login'){
    ?>
        <script>
            window.location.href="../loginForm.php";
        </script>
    <?php
}
$id = $_SESSION['id'];
$email=$_SESSION['email'];

$sql = "SELECT * FROM `register` WHERE id= $id";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);



if($num>0){
  while($row = mysqli_fetch_array($result))
 {
  $name= $row['firstName']." ".$row['middleName']." ".$row['lastName'];

?>

<section class="user-profile ml-5">
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5 mb-3" src="https://w7.pngwing.com/pngs/754/2/png-transparent-samsung-galaxy-a8-a8-user-login-telephone-avatar-pawn-blue-angle-sphere-thumbnail.png" width="200px"><span class="font-weight-bold">
                <?php echo $name; ?>
            </span><span class="text-black-50"><?php echo $_SESSION['email']; ?></span><span> </span></div>
        </div>
        <div class="col-md-8 border-right">
            <form method="post">
               
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Edit Profile </h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-4"><label class="labels">First Name</label><input type="text" class="form-control" 
                    name="firstName" id="firstName" value= "<?php echo $row['firstName'] ?>" required></div>

                    <div class="col-md-4"><label class="labels">Middle Name</label><input type="text" class="form-control" name="middleName" id="middleName"  value="<?php echo $row['middleName'] ?>" placeholder="Middle Name"></div>

                    <div class="col-md-4"><label class="labels">Last Name</label><input type="text" class="form-control" name="lastName" id="lastName" value="<?php echo $row['lastName'] ?>" placeholder="Last Name" required></div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter mobile number" name="mobile" id="mobile" value="<?php echo $row['mobile'] ?>" required></div>

                    <div class="col-md-6"><label class="labels">Email ID</label><input type="text" class="form-control" name="email" id="email"placeholder="enter email id" value="<?php echo $row['email'] ?>" required></div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Gender</label>
                    <input type="text" class="form-control"  name="gender" id="gender"value="<?php echo $row['gender'] ?>" disabled></div>
                    <div class="col-md-6"><label class="labels">Occupation</label><input type="text" class="form-control" name="occupation" id="occupation"  value="<?php echo $row['occupation'] ?>" required></div>
                </div>
                <div class="row mt-2">
                <div class="col-md-6"><label class="labels">Address</label><input type="text" class="form-control" placeholder="enter address" name="address" id="address" value="<?php echo $row['addr'] ?>" required></div>
                    
                    <div class="col-md-6"><label class="labels">Street</label><input type="text" class="form-control" placeholder="Street" name="street" id="street" value="<?php echo $row['street'] ?>" required></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4"><label class="labels">City</label><input type="text" class="form-control" placeholder="City" name="city" id="city"value="<?php echo $row['city'] ?>" required></div>

                    <div class="col-md-4"><label class="labels">State/Region</label><input type="text" class="form-control" name="state" id="state" value="<?php echo $row['state'] ?>" placeholder="state" required></div>

                    <div class="col-md-4"><label class="labels">PIN Code</label><input type="number" class="form-control" name="pin" id="pin" value="<?php echo $row['pin'] ?>" placeholder="PIN Code" required></div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" name="submit" id="submit" type="submit">Save Profile</button></div>
            </div>
        </div>
        <!-- <div class="col-md-3">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
            </div>
        </div> -->
    </div>
</div>

</form>
</div>
</div>
  
</section>

<?php 
  }
}

if(isset($_POST['submit'])){
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $mobile = $_POST['mobile'];
    $setEmail = $_POST['email'];
    $occupation = $_POST['occupation'];
    $add = $_POST['address'];
    $city = $_POST['city'];
    $street = $_POST['street'];
    $state = $_POST['state'];
    $pin = $_POST['pin'];


$sql="UPDATE `register` SET `id`=$id,`firstName`='$firstName',`middleName`='$middleName',`lastName`='$lastName',`mobile`=$mobile,`email`='$setEmail',`occupation`='$occupation',`addr`='$add',`street`='$street',`city`='$city',`state`='$state',`pin`=$pin WHERE id = $id";

if($conn->query($sql)===TRUE){
    ?>
        <script>
            window.location.href = "http://localhost/braincare/dashboard/user.php";
        </script>
    <?php
}
else{
    echo "Error Updating Table".$conn->error;
}
}

?>