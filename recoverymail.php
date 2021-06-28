

<?php
include("connection.php");
require 'PHPMailer/PHPMailerAutoload.php';

 # here we attach connection file using include function.


if(isset($_POST['signup'])){
  # how to get data from OUR FORM

  #$name=$_POST['name'];

 
  $user =mysqli_real_escape_string($con, $_POST['username']);  
  
  
   // $date=date('Y-m-d h:i:s');
   $q="select * from c1 where username='$user'";
   $r=mysqli_query($con,$q);


   $username=mysqli_num_rows($r);

   if($username){
    $userdata=mysqli_fetch_array($q);

    $name=$userdata['name'];
    $token = $userdata['token'];




//Create a new PHPMailer instance
// $recipient=array('rajsaurav171195@gmail.com'=>'Saurav','kingprashant251@gmail.com'=>'Prashant','nisun16is@cmrit.ac.in'=>'Nipun','manaskumar5151@gmail.com'=>'Manas');

$mail = new PHPMailer();
// $mail->SMTPDebug = 3;
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure='tls';  //ssl
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;    // 465
$mail->IsHTML(true);
$mail->CharSet='UTF-8';
$mail->Username='kumarmanas984@gmail.com';
$mail->Password='sumo07070';
$mail->SetFrom('kumarmanas984@gmail.com', 'BIKE REPAIRING CENTER');
// foreach($recipient as $mails=>$name){
//   $mail->AddAddress($mails,$name);
//    }

$q="select * from c1 where status=1";
$r=mysqli_query($con,$q);

if (mysqli_num_rows($r)>0) {
    
    $mail->addReplyTo('noreply@example.com', 'No-Replay');

    while ($row=mysqli_fetch_assoc($r)) {
        $mail->addBCC($row['username']);
    }

    // $mail->addReplyTo('noreply@example.com', 'No-Replay');
    // $mail->addCC('$username');
    // $mail->addBCC('manaskumar5151@gmail.com');
    //Attachments
   $mail->Subject='Password Body';
    $mail->Body "hi, $name. Click here too rest your password 
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
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message sent!';
    }

}else{
    echo 'Error! Check Your Code';
}

