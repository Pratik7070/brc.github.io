<?php 
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
  $mail->AddAddress();
//    }
// $mail->addReplyTo('noreply@example.com', 'No-Replay');
$mail->addCC('kumarmanas984@gmail.com');

// while ($row=mysqli_fetch_assoc($r)) {
//         $mail->addBCC($row['username']);
//     }
// $mail->addBCC('rajivkumar.joint@gmail.com');
//Attachments
// $mail->addAttachment('upload/default.jpg');    
$mail->Subject = "Password Reset";
$mail->Body= "Hi,hello";
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



    


?>