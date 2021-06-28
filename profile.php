<?php
include"header.php";
// echo"<pre>";
// print_r($_SESSION);
$id=$_SESSION['sessdata']['id'];
$q="select profilephoto from c1 where id='$id'";
$r=mysqli_query($con,$q);


$row=mysqli_fetch_assoc($r);
$profilename=$row['profilephoto'];
?>




<!DOCTYPE html>
<html>
<head>
	<style>
		
.profile-card .profile-header {
  background-color: #ad1455;
  padding: 42px 0; }

.profile-card .profile-body .image-area {
  text-align: center;
  margin-top: -64px; }
  .profile-card .profile-body .image-area img {
    border: 2px solid #ad1455;
    padding: 2px;
    margin: 2px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    border-radius: 50%; }

.profile-card .profile-body .content-area {
  text-align: center;
  border-bottom: 1px solid #ddd;
  padding-bottom: 15px; }
  .profile-card .profile-body .content-area p {
    margin-bottom: 0; }
    .profile-card .profile-body .content-area p:last-child {
      font-weight: 600;
      color: #ad1455;
      margin-top: 5px; }

.profile-card .profile-footer {
  padding: 15px; }
  .profile-card .profile-footer ul {
    margin: 0;
    padding: 0;
    list-style: none; }
    .profile-card .profile-footer ul li {
      border-bottom: 1px solid #eee;
      padding: 10px 0; }
      .profile-card .profile-footer ul li:last-child {
        border-bottom: none;
        margin-bottom: 15px; }
      .profile-card .profile-footer ul li span:first-child {
        font-weight: bold; }
      .profile-card .profile-footer ul li span:last-child {
        float: right; }

.card-about-me .body ul {
  margin: 0;
  padding: 0;
  list-style: none; }
  .card-about-me .body ul li {
    border-bottom: 1px solid #eee;
    margin-bottom: 10px;
    padding-bottom: 15px; }
    .card-about-me .body ul li:last-child {
      border: none;
      margin-bottom: 0;
      padding-bottom: 0; }
    .card-about-me .body ul li .title {
      font-weight: bold;
      color: #666; }
      .card-about-me .body ul li .title i {
        margin-right: 2px;
        position: relative;
        top: 7px; }
    .card-about-me .body ul li .content {
      margin-top: 10px;
      color: #999;
      font-size: 13px; }

.panel-post {
  -webkit-border-radius: 0;
  -moz-border-radius: 0;
  -ms-border-radius: 0;
  border-radius: 0; }
  .panel-post .panel-heading {
    background-color: #fff;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    -ms-border-radius: 0;
    border-radius: 0; }
    .panel-post .panel-heading .media {
      margin-bottom: 0; }
      .panel-post .panel-heading .media a img {
        width: 42px;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -ms-border-radius: 50%;
        border-radius: 50%; }
      .panel-post .panel-heading .media .media-body {
        padding-top: 5px; }
        .panel-post .panel-heading .media .media-body h4 {
          font-size: 14px; }
          .panel-post .panel-heading .media .media-body h4 a {
            color: #666; }
  .panel-post .panel-body {
    padding: 0; }
    .panel-post .panel-body .post .post-heading {
      padding: 12px 15px; }
      .panel-post .panel-body .post .post-heading p {
        margin-bottom: 0; }
  .panel-post .panel-footer {
    background-color: #fff;
    border: none; }
    .panel-post .panel-footer ul {
      margin: 0;
      padding: 0;
      list-style: none; }
      .panel-post .panel-footer ul li {
        display: inline-block;
        margin-right: 12px; }
        .panel-post .panel-footer ul li:last-child {
          float: right;
          margin-right: 0; }
        .panel-post .panel-footer ul li a {
          color: #777;
          text-decoration: none; }
          .panel-post .panel-footer ul li a i {
            font-size: 16px;
            position: relative;
            top: 4px;
            margin-right: 2px; }
          .panel-post .panel-footer ul li a span {
            font-size: 13px; }
    .panel-post .panel-footer .form-group {
      margin-bottom: 5px;
      margin-top: 20px; }



	</style>
</head>
<body style="background-image: url(b.jpg);">


 <div class="container">
 	<div class="row">
 		 <div class="col-md-12">
 <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
               <div class="col-xs-12 col-sm-3" style="margin-left: 322px;margin-bottom: -320px;">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
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
                            </div>
                            <div class="content-area">
                                <h3><?php echo $_SESSION['sessdata']['name'];  ?></h3>
                                <p>Web Software Developer</p>
                                <p><?php echo $_SESSION['sessdata']['username'];  ?></p>
                            </div>
                        </div>
                        <div class="profile-footer">
                            <ul>
                                <li>
                                    <span>Followers</span>
                                    <span>1.234</span>
                                </li>
                                <li>
                                    <span>Following</span>
                                    <span>1.201</span>
                                </li>
                                <li>
                                    <span>Friends</span>
                                    <span>14.252</span>
                                </li>
                            </ul>
                            <button class="btn btn-primary btn-lg waves-effect btn-block">FOLLOW</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                     <div class="container-fluid" style="    margin-top: -128px;
    margin-left: 652px;
}
">
            <div class="row clearfix">
               <div class="col-xs-12 col-sm-3" >
                    <div class="card card-about-me" style="    height: 484px;
    margin-top: -39px;">
                        <div class="header">

                            <h2>ABOUT ME</h2>
                        </div>
                        <div class="body">
                            <ul>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">library_books</i>
                                        Education
                                    </div>
                                    <div class="content">
                                        B.S. in Computer Science from the University of Tennessee at Knoxville
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">location_on</i>
                                        Location
                                    </div>
                                    <div class="content">
                                        Malibu, California
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">edit</i>
                                        Skills
                                    </div>
                                    <div class="content">
                                        <span class="label bg-red">UI Design</span>
                                        <span class="label bg-teal">JavaScript</span>
                                        <span class="label bg-blue">PHP</span>
                                        <span class="label bg-amber">Node.js</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">notes</i>
                                        Description
                                    </div>
                                    <div class="content">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

</body>
</html>

