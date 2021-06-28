<?php
require_once ('PHPMailer/PHPMailerAutoload.php');

// echo"<pre>";
// print_r($_SESSION);



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
    $mail->addReplyTo('noreply@example.com', 'No-Replay');

        $mail->addBCC('kumarmanas984@gmail.com');
    

    // $mail->addReplyTo('noreply@example.com', 'No-Replay');
    // $mail->addCC('$username');
    // $mail->addBCC('manaskumar5151@gmail.com');
    //Attachments
    $mail->Subject = 'Regarding for Your BOOKING';
    $mail->Body='<b style="color:green;">Your Booking Is Susscess Full THANK YOU</b>';
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



?>