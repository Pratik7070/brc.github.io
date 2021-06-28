<?php
include "header.php";

   if(isset($_POST['update'])){
    $uid=$_POST['userid2'];
    $name=$_POST['name'];
    $status=$_POST['status'];

    $q="update c1 set name='$name',status='$status' where id='$uid'";
    $r=mysqli_query($con,$q);
    if(mysqli_affected_rows($con)){
      $msg='Account Updated Successfully';
    }else{
      $msg='Error occur';
    }
   $u=base64_decode($_REQUEST['userid']);# using this method you can access 

   $q="select * from c1 where id='$u'";
   $r=mysqli_query($con,$q);
   $row=mysqli_fetch_assoc($r);



   }else{
    $msg='';
   $u=base64_decode($_REQUEST['userid']);# using this method you can access 
   $q="select * from c1 where id='$u'";
   $r=mysqli_query($con,$q);
   $row=mysqli_fetch_assoc($r);
   
   }
?>

 <div class="container">
  <div class="row">
    <div class="col-md-12">
      <br>
       <h3>Edit Users</h3>
         <h3 style="color:black;"><?php  echo $msg; ?></h3>
          <form method="post">
            
            <input type="hidden" value="<?php echo $row['id']; ?>" name="userid2">
            <input type="text" name="name" id="name" placeholder="Enter Name" class="form-control" value="<?php echo $row['name'];  ?>">
            <br>
            <br>
            <input type="email" name="name"name id="name" placeholder="Enter Username" class="form-control" value="<?php echo $row['username'];  ?>" disabled>
            <br><br>

            <select name="status" class="form-control">
              <?php 
               if($row['status']==1){
              ?>
              <option value="1" selected>Active</option>
              <option value="0">Suspend</option>
              <?php
               }else{
               ?>
               <option value="0"selected>Suspend</option>
               <option value="1" >Active</option>
               <?php 
                }
                ?>

            <input type="submit" name="update" value="Update" class="btn btn-primary btn-block">
            <br>



<a class="btn btn-lg btn-outline-warning" href="sendmail.php?userid=<?php echo base64_encode($row['id']) ?>">Confirm</a>
 

          </form> 
          <br><br>
    </div>
  </div>
 </div>

<?php
include "footer.php";
?>


 