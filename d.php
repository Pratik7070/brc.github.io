<?php
include "common.php";
$id=$_SESSION['sessdata']['id'];
$name=$_SESSION['sessdata']['name'];

$nfile=$name.'('.$id.')';
$msg='';
if(isset($_POST['upload'])){
	$target_dir='upload/';

	$name=$nfile.rand(1000,8900).$_FILES['uploadphoto']['name']; #name
	$tmpname=$_FILES['uploadphoto']['tmp_name'];  # tmp name
	$ext=strtolower(pathinfo($_FILES['uploadphoto']['name'],PATHINFO_EXTENSION));  # exetension findout

    $size=$_FILES['uploadphoto']['size'];  

    if($name!=''){
    	if($ext=='png' ||  $ext=='jpg' || $ext=='jpeg'){
    	    if($size < 1000000000){
              #move_uploaded_file(filename, destination)  
              move_uploaded_file($tmpname, $target_dir.$name);
              $q="update c1 set profilephoto='$name' where id='$id'";
              $r=mysqli_query($con,$q);
              $msg="Photo uploaded Successfully";
    	    }else{
    	    	$msg='File must be less than 2 mb';
    	    }
    	}else{
    		$msg="File Type Not Supported";
    	}
    }else{
    	$msg="Files Not Available";
    }

}

?>

<html>


<head></head>

<body style="background-color: #fff;">

<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			  <p class="myheading">
			  	Welcome <?php  echo $_SESSION['sessdata']['name'];  ?> to Our Admin Pannel
			  </p>

		</div>
<div class="col-md-6" style="
    margin-top: 50px;
">
			<h3 class="myheading" style="color:orange;">Upload Photo /File</h3>
            <p><?php echo $msg; ?> </p>
            <form method="post" enctype="multipart/form-data">

			<input type="file" name="uploadphoto" id="uploadphoto" class="form-control">
			<br>

			<input type="submit" name="upload" class="btn btn-primary" value="Upload">

						<a href="userprofile.php" class="btn btn-primary" >Dashboard</a>


		    </form>

			<br><br>
		</div>


	</div>
</div>
</body>
</html>
<?php
include "footer.php";
?>


 