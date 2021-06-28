<?php
session_start();
include "connection.php";
if(!isset($_COOKIE['UID'])){
  header('Location:booking.php');
  die;
}
if(!isset($_SESSION['signup'])){
      
       $uid=$_COOKIE['UID'];
       $q="select * from booking where id='$uid'";
       // echo $q;die();
       $r=mysqli_query($con,$q);
       $row=mysqli_fetch_assoc($r);
       $_SESSION['signup']=1;
       $_SESSION['sessdata']=$row;
}
?>
