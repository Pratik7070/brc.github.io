<?php
 include("connection.php");
 $msg="";

 if(isset($_POST['signup'])){

  if (isset($_GET['token'])) {
      $token = $_GET['token'];


    $newpassword=mysqli_real_escape_string($con,md5($_POST['password']));
    




       
         $updatequery = "update c1 set password='$newpassword' where token='$token'";

        $r=mysqli_query($con,$updatequery);

        if ($r){
          $msg= "Your password has been updated Please Go to Login Page";
        }else{
          $msg="Your Password is not updated";
          header('location:reset.php');
        }
    }
  }
 



?>

<html>
  
     <title>Password Recover </title>
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

 <div class="container-login100" style="background-image: url('b1.jpg');justify-content: flex-end;">

     
    <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
      <form method="POST"class="login100-form validate-form">

        <?php echo $msg; ?>
       
       <span class="login100-form-title p-b-37" style="
    color: #1ef504;
">
           <p style="color:black  FONT-WEIGHT: BOLD;">Bike Repairing Center</p>Sign In
        </span>
         

        <div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
          <input class="input100" type="password" name="password" placeholder="Enter New Password">
          <span class="focus-input100"></span>
        </div>

        <div style="        MARGIN-LEFT: 79PX;
    margin-top: -17px;
"class="btn btn-primary btn-rounded">
          <button type="submit" name="signup" id="signup" value="signup">
      Update Password</button>
        </div>
<br>
<div style="
    margin-top: 17px;
">

  <span style="color:black; "><u><b>Login Here</b></u></span>
<a href="login.php" class="btn btn-primary btn-rounded" style="
    BACKGROUND-COLOR: BLUE;
    COLOR: WHITE;
    MARGIN-LEFT: 0px;
">LOGIN</a>
</div>
<br>

   <!--   <span class="txt1" style="
    FONT-SIZE: 20PX;
    FONT-WEIGHT: BOLD;
    FONT-FAMILY: cursive;
    COLOR: black;
    margin-left: 127px;
    margin-top:67px;
    text-align: center;
">
       

            Or Login With
          </span>
    <div class="flex-c p-b-112" style="color: black;margin-top: 67px;">
          <a href="#" class="login100-social-item">
            <i class="fa fa-facebook-f"></i>
          </a>

          <a href="#" class="login100-social-item">
            <img src="images/icons/icon-google.png" alt="GOOGLE">
          </a>
        </div>

      <!--   <div class="text-center">
          <a href="#" class="txt2 hov1">
                <button type="submit" name="login" id="login" value="Login">
      Login</button>
          </a>
        </div> --> 
      </form>

      
    </div>
  </div>
  
  

  <div id="dropDownSelect1"></div>
  
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