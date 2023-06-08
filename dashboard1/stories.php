<?php 
$_SESSION['head'] = "Inspiring Stories";
include("./sidebar.php");
include("./header/side.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>BrainCare</title>

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<style media="screen">
  @import url('https://fonts.googleapis.com/css?family=Lobster+Two:700|Poppins&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.start-btn{
    margin-left: 15rem;
}

.center{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.start-btn a{
  font-size: 22px;
  /* background: white; */
  color: #02242b;
  padding: 15px 18px;
  border-radius: 5px;
  text-decoration: none;
  text-transform: uppercase;
  font-weight: 600;
  letter-spacing: 1px;
  position: relative;
  border: #000;
  border-radius: 50%;

}
.modal-box{
  top: 40%;
  opacity: 0;
  visibility: hidden;
  background: white;
  height: auto;
  width: 480px;
  padding: 18px 10px;
  border-radius: 5px;
  box-shadow: 5px 5px 30px rgba(0,0,0,.2);
}

.start-btn.show-modal{
  opacity: 0;
  visibility: hidden;
}
.modal-box.show-modal{
  top: 50%;
  opacity: 1;
  visibility: visible;
  transition: .4s;
}
.modal-box .fa-times{
  position: absolute;
  top: 0;
  right: 0;
  background: #0569d4;
  height: 40px;
  width: 40px;
  line-height: 40px;
  margin: 10px;

  color: white;
  font-size: 18px;
  border-radius: 100%;
  text-align: center;
  cursor: pointer;
}
.fa-times:hover{
  font-size: 22px;
}


.form_container{
  background: #fff;
  padding: 30px;
  margin-top: 20px;
  border-radius: 3px;
}

.form_container .form_item{
  margin-bottom: 25px;
}

.form_container .form_wrap.form_grp{
  display: flex;
}

.form_container .form_wrap.form_grp .form_item{
  width: 50%;
}

.form_container .form_wrap.form_grp .form_item:first-child{
  margin-right: 4%;
}

.form_container .form_item label{
  display: block;
  margin-bottom: 5px;
}

.form_container .form_item input,
.form_container .form_item select{
  width: 100%;
  padding: 10px;
  font-size: 16px;
  border: 1px solid #dadce0;
  border-radius: 3px;
}
 
.form_container .btn input[type="submit"]{
  background: #6271f0;
  border: 1px solid #6271f0;
  padding: 10px;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  color: #fff;
}

.card{
    opacity: 1;
}

h3{
  display: flex;
  justify-content: center;
}
</style>
    </head>
   <body>
    <section class="story">
    
    <div class="container">
        <!-- <h3>Inspiring Stories</h3> -->
    </div>
      <div class="start-btn">
        <h4>Share Your Stories  <a href="#">+</a></h4>
       
      </div>
      <div class="center modal-box">

         <div class="fas fa-times"></div>



  <div class="form_container">
    <form name="form" action="shareStory.php" method="POST">
      <div class="form_wrap form_grp">
          <div class="form_item">
              <label>First Name</label>
              <input type="text" name="firstName" required>

          </div>
          <div class="form_item">
              <label>Middle Name</label>
              <input type="text" name="firstName" required>

          </div>
          <div class="form_item">
              <label>Last Name</label>
              <input type="text" name="lastName" required>

          </div>
      </div>
      <div class="form_wrap">
          <div class="form_item">
              <label>Topic</label>
              <input type="text" name="topic" required>

          </div>
      </div>
      <div class="form_wrap form_grp">

          <div class="form_item">
              <label>Message</label>
              <textarea cols="50"name="message" required></textarea>
          </div>
      </div>     
      <div class="btn">
        <input type="submit" value="Share">
      </div>
    </form>    
  </div>  
</div>

<?php 
$sql = "SELECT * FROM `stories`";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);

if($num>0){
    while($row = mysqli_fetch_array($result))
   {
    $name= $row['firstName']." ".$row['lastName'];
  
?>

<script>
        var newDate = new Date("<?php echo $row['date'] ?>");
        var nd = newDate.toDateString();

    </script>

<div class="container">
<div class="card">
  <div class="card-header">
  <?php echo $row['message']; ?>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p><?php echo $row['message']; ?></p>
      <footer class="blockquote-footer">By <cite title="Source Title"><?php echo $name; ?> </cite></footer>
      <footer class="blockquote-footer"><?php
   echo "<script>document.writeln(nd);</script>";
?></footer>
    </blockquote>
  </div>
</div>
</div>

<?php 
   }
}
?>


      <script>
         $(document).ready(function(){
           $('.start-btn').click(function(){
             $('.modal-box').toggleClass("show-modal");
             $('.start-btn').toggleClass("show-modal");
             $('.card').css("opacity", 0);
           });
           $('.fa-times').click(function(){
             $('.modal-box').toggleClass("show-modal");
             $('.start-btn').toggleClass("show-modal");
             $('.card').css("opacity", 1);
           });
         });
      </script>
      </section>
   </body>
</html>
