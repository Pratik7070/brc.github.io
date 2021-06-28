<?php
 include("connection.php");
 $msg="";
 



 if(isset($_POST['signup'])){

    $username=mysqli_real_escape_string($con,$_POST['username']);

    $q="select * from c1 where username='$username'";
    $r=mysqli_query($con,$q);


    if(mysqli_num_rows($r)){

      $userdata = mysqli_fetch_array($r);

      $name = $userdata['name'];

      $token = $userdata['token'];

      $email_to = $username;

require_once ('PHPMailer/PHPMailerAutoload.php');

//Create a new PHPMailer instance
// $recipient=array('rajsaurav171195@gmail.com'=>'Saurav','kingprashant251@gmail.com'=>'Prashant','niun16is@cmrit.ac.in'=>'Nipun','manaskumar5151@gmail.com'=>'Manas');

$mail = new PHPMailer();
//$mail->SMTPDebug = 3;
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure='tls';  //ssl
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;    // 465
$mail->IsHTML(true);
$mail->CharSet='UTF-8';
$mail->Username='bikerepairingcenterr@gmail.com';
$mail->Password='m7070705502';
$mail->SetFrom('bikerepairingcenter@gmail.com', 'Bike Repairing Center');
// foreach($recipient as $mails=>$name){
  $mail->AddAddress($email_to);
//    }
// $mail->addReplyTo('noreply@example.com', 'No-Replay');
// $mail->addCC('abhinavankit.ac@gmail.com');

// while ($row=mysqli_fetch_assoc($r)) {
//         $mail->addBCC($row['username']);
//     }
// $mail->addBCC('rajivkumar.joint@gmail.com');
//Attachments
// $mail->addAttachment('upload/default.jpg');    
$mail->Subject = "Password Reset";
$mail->Body= "Hi, $name. Click here to reset your password 
        http://localhost/bike/dashboard/reset.php?token=$token";
$mail->SMTPOptions = array(
    'ssl' => [
        'verify_peer' => false,
        'verify_depth' => false,
        'allow_self_signed' => false,
        'verify_peer_name' => false
    ]
);

if (!$mail->send()) {
        $msg= 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            $msg= 'Check your mail to rest Your password';
        }
        
    }else{
          $msg = "No email found";
    }
  }
    


?>

<html>
  <head>
     <title>Recover Your Account </title>
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
      <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST"class="login100-form validate-form">
        <?php echo $msg; ?>
     
       <span class="login100-form-title p-b-37" style="
    color: #1ef504;
">
           <p style="color:black  FONT-WEIGHT: BOLD;">Bike Repairing Center</p>Account Recover 
        </span>


             <div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
          <input class="input100" type="text" name="username" placeholder="username or email">
          <span class="focus-input100"></span>
        </div>


<!--         <div class="btn" style="color: #fff background-color:blue;">
 -->          
<button  style="
      BACKGROUND-COLOR: BLUE;
    COLOR: WHITE;
    MARGIN-LEFT: 163PX;
    border-radius: 64%;
    font-size: 20px;
"type="submit" name="signup" id="signup" value="signup">
     Send Mail</button>
        </div>

<!-- <a href="recovermail.php">send mail</a> -->
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