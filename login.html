
<?php
session_start();
include"connection.php";
if(isset($_SESSION['loggedin']) || isset($_COOKIE['UID'])){
}

  if(isset($_POST['login'])){
    
    $username=mysqli_real_escape_string($con,$_POST['username']);
    $password=mysqli_real_escape_string($con,md5($_POST['password']));

    $q="select * from c1 where username='$username'and password='$password' and status=1";
    $r=mysqli_query($con,$q);  # here $r get total rows after executing sql query

    if(mysqli_num_rows($r)==1){  # here we check at least one user returned or not


      //session   this will store your data for further use
       $row=mysqli_fetch_assoc($r);  # thsi function helps to get our data from our query result set.
       $_SESSION['loggedin']=1;
       $_SESSION['sessdata']=$row;
       // this is how you can set cookie in php
        setcookie('UID',$row['id'],time()+60*60*24*30);

  
      header('location:dashboard.php');  # this function helps to open new page
    }else{
      $msg="Wrong Credentials";
    }
  
  }


?>

<html>
  <head>
     <title>Login </title>
     <!-- <link  rel="stylesheet" href="login.css"> -->

 <title>Login V9</title>
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
  
  <?php $msg=''; ?>
 <div class="container-login100" style="background-image: url('b1.jpg');justify-content: flex-end;">

     
    <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
      <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);   ?>"method="POST"class="login100-form validate-form">
       <span class="login100-form-title p-b-37" style="
    color: #1ef504;
">
           <p style="color:black  FONT-WEIGHT: BOLD;">Bike Repairing Center</p>Sign In
        </span>
        <?php $msg='';?>

        <div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
          <input class="input100" type="text" name="username" placeholder="username or email">
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
          <input class="input100" type="password" name="password" placeholder="password">
          <span class="focus-input100"></span>
        </div>

        <div  class="btn " style="
    BACKGROUND-COLOR: BLUE;
    COLOR: WHITE;
    MARGIN-LEFT: 112px;">
          <button type="submit" name="login" id="login" value="Login">
      Login</button>
        </div> <br>
<p class="text-center" style="
    color: black;
    font-size: 23px;
"><u style="font-family: cursive; color: blue;">Forgot your password=></u><a href="recover.php">click here </a></p>


<p class="text-center" style="
    color: black;
    font-size: 23px;
"><u style="font-family: cursive; color: blue;">New User Signup Here=></u><a href="singnup.php">click here </a></p><br>

<!-- <a href="../singnup.php" class="btn " style="
    BACKGROUND-COLOR: BLUE;
    COLOR: WHITE;
    MARGIN-LEFT: 156PX;
">SIGNUP</a> -->
<br>

 
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