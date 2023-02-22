<?php 
include("./sidebar.php");

include("../connection/config.php");

      $sql = "SELECT * FROM meetings where usedFor='all'";
  $result = $conn->query($sql);
  $num = mysqli_num_rows($result);
?>
<div class="container">


<table class="table table-hover m-5">
  <thead>
    <tr class="text-center">
      <th scope="col">#</th>
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
      <th scope="row"> <?php echo $row['id']; ?> </th>
      <td><?php echo $row['topic']; ?></td>
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