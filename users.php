<?php
include "header.php";
$q="select id,name,username,status from c1";
$r=mysqli_query($con,$q);
?>
<html>
   <head>
     <title>MyAdmin</title>
       <link rel="Stylesheet" href="myadmin.css">
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
 -->
   
 <div class="container">
 	<div class="row">
 		<div class="col-md-12">
 			 <h3>Users</h3>
             <table class="table">
             	<tr class="bg-primary">
             		<th>UserId</th>
             		<th>Name</th>
             		<th>Email</th>
             		<th>Action</th>
                  <th>BOOKING</th>
             	</tr>
             	<?php
                  while($row=mysqli_fetch_assoc($r)){
       
                  if($row['status']==1){
                  ?>
                  <tr style="background-color:green;color:#fff;">
                  <?php
                   }else{
                  ?>
                  <tr style="background-color:red;color:#fff;">
                  <?php    
                   }
                  ?>
             	  
             	  <td><?php  echo $row['id']; ?></td>
             	  <td><?php  echo $row['name'];  ?></td>
             	  <td><?php  echo $row['username'];  ?></td>

             	  <td>
             	  	 <a href="editusers.php?userid=<?php echo base64_encode($row['id']);  ?>" class="btn btn-info"><span class="fa fa-pencil"></span></a>
             	  	 <a href="deleteusers.php?userid=<?php echo base64_encode($row['id']);  ?>"class="btn btn-danger"><span class="fa fa-trash"></span></</a>
             	  </td>	
                <td>

<a href="services.php" class="btn btn-info"><span class="fa fa-pencil"></span></a>

                </td>
             	</tr>
             	<?php
                 }
             	?>
             </table>
 		</div>
 	</div>
 </div>

<?php
include "footer.php";
?>


 