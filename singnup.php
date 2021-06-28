<?php
# form handling  
# how to take input from user and get it into php
include("connection.php"); # here we attach connection file using include function.
$arr=array('errortype'=>0,'msg'=>'');

if(isset($_POST['signup'])){
  # how to get data from OUR FORM

  #$name=$_POST['name'];

  $name =mysqli_real_escape_string($con,$_POST['name']);
  $user =mysqli_real_escape_string($con, $_POST['username']);  
  $pass =mysqli_real_escape_string($con,md5($_POST['password']));

  $token=bin2hex(random_bytes(15));
    $q="select * from c1 where username='$user'";

   $r=mysqli_query($con,$q);
   // $date=date('Y-m-d h:i:s'); 
 $r=mysqli_query($con,$q); 
   if(mysqli_num_rows($r)==1){
    $arr=array('errortype'=>1,'msg'=>'User Already Exist');

   }else{
       $q="insert into c1(name,username,password,token)values('$name','$user','$pass','$token')";
       $r=mysqli_query($con,$q);  # this function helps to execute our query , where $con is connection variable and $q is our query string.
       if(mysqli_affected_rows($con)){
        $arr=array('errortype'=>0,'msg'=>'Account Created');
      }else{
        $arr=array('errortype'=>1,'msg'=>'Server Issue Occur,Try Again !');
      }

   }




}




?>

<html>
  <head>
     <title>Signup</title>
  <head>

     <!-- <link  rel="stylesheet" href="login.css"> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css1/util.css">
  <link rel="stylesheet" type="text/css" href="css1/main.css">
<!--1===============================================================================================-->
</head>
<body>

      <?php 
          if($arr['errortype']==1){
      ?>
      <span style="color:red;"><?php echo $arr['msg']; ?></span>
      <?php
          }else{
      ?>
      <span style="color:green;"><?php echo $arr['msg']; ?></span>
      <?php
      }
      ?>

 <div class="container-login100" style="background-image: url('b1.jpg');justify-content: flex-end;">

     
    <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
      <form method="POST"class="login100-form validate-form" >
       <span class="login100-form-title p-b-37" style="
    color: #1ef504;
">
           <p style="color:black  FONT-WEIGHT: BOLD;">Bike Repairing Center</p>Sign In
        </span>

        <div class="wrap-input100 validate-input m-b-20" data-validate="Enter username ">
          <input class="input100" type="text" name="name" placeholder="username">
          <span class="focus-input100"></span>
        </div>
             <div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
          <input class="input100" type="text" name="username" placeholder="username or email">
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
          <input class="input100" type="password" name="password" placeholder="password">
          <span class="focus-input100"></span>
        </div>

        <div onclick="account()">
      <button class="btn btn-primary btn-sm" type="submit" name="signup" id="signup" value="signup" style="
    margin-left: 107px;
">
      SIGNUP</button>
        </div>



<span class="txt1" style="
    FONT-SIZE: 20PX;
    FONT-WEIGHT: BOLD;
    FONT-FAMILY: cursive;
    COLOR: black;
    margin-left: 127px;
    margin-top:67px;
    text-align: center;
">
      <!--   Already Coustmer Login -->  


          </span>



 
<a href="login.php" class="btn " style="
    BACKGROUND-COLOR: BLUE;
    COLOR: WHITE;
    MARGIN-LEFT: -21PX;
    /* height: 34px; */
    margin-top: 20px;

">LOGIN</a>
<br>

     <span class="txt1" style="
    FONT-SIZE: 20PX;
    FONT-WEIGHT: BOLD;
    FONT-FAMILY: cursive;
    COLOR: black;
    margin-left: 127px;
    margin-top:67px;
    text-align: center;
">
       <!-- 

            Or Login With
          </span>
    <div style="color: black;" class="flex-c p-b-112" style="color: black;margin-top: 67px;">
          <a href="#" class="login100-social-item">
            <i class="fa fa-facebook-f"></i>
          </a>

          <a href="#" style="color: black;"class="login100-social-item">
            <img src="images/icons/icon-google.png" alt="GOOGLE">
          </a>
        </div>

      <!--   <div class="text-center">
          <a href="#" class="txt2 hov1">
                <button type="submit" name="login" id="login" value="Login">
      Login</button>
          </a> -->
        </div>  
      </form>

      
    </div>
  </div>
  
  

  <div id="dropDownSelect1"></div>
  <script>function account(){
alert("Account Created Sussesfully");

  </script>
  
<!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>

</body>
</html>