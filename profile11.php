<?php
include"header.php";
// echo"<pre>";
// print_r($_SESSION);
$id=$_SESSION['sessdata']['id'];
$q="select profilephoto from user where id='$id'";
$r=mysqli_query($con,$q);
$row=mysqli_fetch_assoc($r);
$profilename=$row['profilephoto'];
?>

 <div class="container">
 	<div class="row">
 		 <div class="col-md-12">
 		 	 <table class="table">
			 	<tr class="bg-primary">
			 		<th>Empoyee Id</th>
			 		<th>Name</th>
			 		<th>Username</th>
			 		<th>Account Creeated</th>
			 		<th>Pofile</th>
			 	</tr>
			 	<tr>
			 		<td><?php echo $_SESSION['sessdata']['id'];  ?></td>
			 		<td><?php echo $_SESSION['sessdata']['name'];  ?></td>
			 		<td><?php echo $_SESSION['sessdata']['username'];  ?></td>
			 		<td><?php echo $_SESSION['sessdata']['created_date'];  ?></td>
			 		<td>
			 			<?php
                        if($profilename==''){
                        ?> 	
                        <img src="upload/default.jpg" style="width:100px;height:100px;">
                        <?php
                        }else{
                        ?>	
                         <img src="upload/<?php echo $profilename; ?>" style="width:100px;height:100px;">
                        <?php
                        }
			 			?>
 
			 		</td>
			 	</tr>
			 </table>
 		 </div>
 	</div>
</div>
<?php
include"footer.php";
?>