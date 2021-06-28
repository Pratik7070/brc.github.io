<?php
session_start();
include "connection.php";
if(!isset($_COOKIE['UID'])){
  header('Location:admindashboard.php');
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
<html>
   <head>
     <title>MyAdmin</title>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="bike.css"> 
    <title>Hello, world!</title>
 

   </head>
   <body>  
      <?php
       include"menu.php";
      ?>