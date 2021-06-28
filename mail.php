<?php

include "header.php";
require 'PHPMailer/PHPMailerAutoload.php';


 $u=base64_decode($_REQUEST['userid']);# using this method you can access 
 $q="select * from 
 c1 where id='$u'";
 $r=mysqli_query($con,$q);
 $row=mysqli_fetch_assoc($r);

//Create a new PHPMailer instance


$mail = new PHPMailer();
$mail->SMTPDebug = 3;
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure='tls';  //ssl
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;    // 465
$mail->IsHTML(true);
$mail->CharSet='UTF-8';
$mail->Username='kumarmanas984@gmail.com';
$mail->Password='sumo07070';
$mail->SetFrom('manas@example.com', 'manas');
$mail->AddAddress($row['username'],$row['name']);
//Attachments

if($row['status']==1){
$mail->Subject = 'Request Accepted';
$mail->Body='<b style="color:green;">We are happy to inform you request has been for  further process with our mechanic and we will be in touch</b>';
}elseif($row['status']==0){
$mail->Subject = 'Request denied';
$mail->Body='<b style="color:green;">We regret to inform you that we cannot process your request at this time ,please send your details again on <a class="btn btn-lg btn-outline-warning" href="signin.php">Sign in </a></b>';
}
elseif($row['status']==2){
    $mail->Subject = 'Request still not processed';
    $mail->Body='<b style="color:green;">We regret to inform that due to some unforeseen circumstances you request has still not been processes. We regret the inconvienced caused</b>';
    }
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

// header('Location:editusers.php');


?>