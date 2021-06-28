<?php
  // date_default_timezone_set('Asia/kolkata');
  # This file helps to establish connection betwwen server and database.
  $server_name='localhost';
  $user='root';  # default username of your mysql software
  $password='';
  $dbname='connect1';   # this is your databse name 

 # this function create connection and return connection variable
  $con=mysqli_connect($server_name,$user,$password,$dbname);

 # Here we check weather connection esatblished succesfully or not
 if(!$con){
 	echo"Database connection failed";
 	die;
 	 }
// 'rajsaurav171195@gmail.com'


  ?>

