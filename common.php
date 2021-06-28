<?php
session_start();
include "connection.php";
if(!isset($_COOKIE['UID'])){
  header('Location:login.php');
  die;
}
if(!isset($_SESSION['loggedin'])){
      
       $uid=$_COOKIE['UID'];
       $q="select * from c1 where id='$uid'";
       // echo $q;die();
       $r=mysqli_query($con,$q);
       $row=mysqli_fetch_assoc($r);
       $_SESSION['loggedin']=1;
       $_SESSION['sessdata']=$row;
}
?>