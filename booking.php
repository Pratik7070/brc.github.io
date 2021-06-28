<?php
# form handling  
# how to take input from user and get it into php
include("connection.php");
include("m.php");# here we attach connection file using include function.
$arr=array('errortype'=>0,'msg'=>'');

if(isset($_POST['signup'])){
  # how to get data from OUR FORM

  #$name=$_POST['name'];

  $name =mysqli_real_escape_string($con,$_POST['name']);
  $lname =mysqli_real_escape_string($con, $_POST['lname']);  
  $address1 =mysqli_real_escape_string($con,($_POST['address1']));
  $address2 =mysqli_real_escape_string($con,$_POST['address2']);
  $state =mysqli_real_escape_string($con, $_POST['state']);  
  $zip =mysqli_real_escape_string($con,($_POST['zip']));
  $city =mysqli_real_escape_string($con,$_POST['city']);
  $eaddress =mysqli_real_escape_string($con, $_POST['eaddress']);  
  $phone =mysqli_real_escape_string($con,($_POST['phone']));
  $bdetails =mysqli_real_escape_string($con,$_POST['bdetails']);
  $bnum =mysqli_real_escape_string($con, $_POST['bnum']);  
  $bissue=mysqli_real_escape_string($con, $_POST['bissue']);
  $idproof=mysqli_real_escape_string($con, $_POST['idproof']);
  

   // $date=date('Y-m-d h:i:s');
   $q="select * from booking where bnum='$bnum'";
   $r=mysqli_query($con,$q);

   if(mysqli_num_rows($r)==1){
    $arr=array('errortype'=>1,'msg'=>'User Already Exist');

   }else{
       $q="insert into booking(name,lname,address1,address2,state,zip,city,eaddress,phone,bdetails,bnum,bissue,idproof)values('$name','$lname','$address1','$address2','$state','$zip','$city','$eaddress','$phone','$bdetails','$bnum','$bissue','$idproof')";
       $r=mysqli_query($con,$q);  # this function helps to execute our query , where $con is connection variable and $q is our query string.
       if(mysqli_affected_rows($con)){
        $arr=array('errortype'=>0,'msg'=>'BOOKED SUSSESSFULLY CHECK YOUR EMAIL');
      }else{
        $arr=array('errortype'=>1,'msg'=>'Server Issue Occur,Try Again !');
      }

   }




}




?>





<?php
include "c.php";
$id=$_SESSION['sessdata']['id'];
$name=$_SESSION['sessdata']['name'];

$nfile=$name.'('.$id.')';
$msg='';
if(isset($_POST['upload'])){
  $target_dir='upload/';

  $name=$nfile.rand(1000,8900).$_FILES['uploadphoto']['name']; #name
  $tmpname=$_FILES['uploadphoto']['tmp_name'];  # tmp name
  $ext=strtolower(pathinfo($_FILES['uploadphoto']['name'],PATHINFO_EXTENSION));  # exetension findout

    $size=$_FILES['uploadphoto']['size'];  

    if($name!=''){
      if($ext=='png' ||  $ext=='jpg' || $ext=='jpeg'){
          if($size < 1000000){
              #move_uploaded_file(filename, destination)  
              move_uploaded_file($tmpname, $target_dir.$name);
              $q="update booking set idproof='$name' where id='$id'";
              $r=mysqli_query($con,$q);
              $msg="Photo uploaded Successfully";
          }else{
            $msg='File must be less than 2 mb';
          }
      }else{
        $msg="File Type Not Supported";
      }
    }else{
      $msg="Files Not Available";
    }

}

?>

<?php
 include("connection.php");

$msg="";

 if(isset($_POST['signup'])){

    $eaddress=mysqli_real_escape_string($con,$_POST['eaddress']);

    $q="select * from booking where eaddress='$eaddress'";
    $r=mysqli_query($con,$q);


    if(mysqli_num_rows($r)){

      $userdata = mysqli_fetch_array($r);

      $name = $userdata['name'];

      $email_to = $eaddress;

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
$mail->Username='kumarmanas984@gmail.com';
$mail->Password='sumo07070';
$mail->SetFrom('kumarmanas984@gmail.com', 'BIKE REPAIRING CENTER');
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
$mail->Subject = "Booking Confirmation Status Message";
$mail->Body= "Hi,FirstName= $name lastname=$lname  BikeIssuse= $bissue BikeNumber=$bnum 
BikeDetails=$bdetails Status= InProcess...... This is to confirm you that your booking is done Successfully.Thank you!";
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
            $msg= 'Confirmation Email Sent Successfully to Your Email';
        }
        
    }else{
          $msg = "Email Not sent";
    }
  }
    


?>

    <!DOCTYPE html>
<html>
  <head>
    <title>BOOK REGISTRATION </title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, select, textarea, label, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      line-height: 22px;
      }
      h1 {
      position: absolute;
      margin: 0;
      font-size: 40px;
      color: #fff;
      z-index: 2;
      line-height: 83px;
      }
      textarea {
      width: calc(100% - 12px);
      padding: 5px;
      }
      .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 20px;
      }
      form {
      width: 100%;
      padding: 20px;
      border-radius: 6px;
      background: #fff;
      box-shadow: 0 0 8px  #669999; 
      }
      .banner {
      position: relative;
      height: 300px;
      background-image: url("/uploads/media/default/0001/02/c1504011491c4e04e5158b63a27a4ea654b03ed1.jpeg");  
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      }
      .banner::after {
      content: "";
      background-color: rgba(0, 0, 0, 0.2); 
      position: absolute;
      width: 100%;
      height: 100%;
      }
      input, select, textarea {
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      }
      input {
      width: calc(100% - 10px);
      padding: 5px;
      }
      input[type="date"] {
      padding: 4px 5px;
      }
      textarea {
      width: calc(100% - 12px);
      padding: 5px;
      }
      .item:hover p, .item:hover i, .question:hover p, .question label:hover, input:hover::placeholder {
      color:  #669999;
      }
      .item input:hover, .item select:hover, .item textarea:hover {
      border: 1px solid transparent;
      box-shadow: 0 0 3px 0  #669999;
      color: #669999;
      }
      .item {
      position: relative;
      margin: 10px 0;
      }
      .item span {
      color: red;
      }
      .week {
      display:flex;
      justfiy-content:space-between;
      }
      .colums {
      display:flex;
      justify-content:space-between;
      flex-direction:row;
      flex-wrap:wrap;
      }
      .colums div {
      width:48%;
      }
      input[type="date"]::-webkit-inner-spin-button {
      display: none;
      }
      .item i, input[type="date"]::-webkit-calendar-picker-indicator {
      position: absolute;
      font-size: 20px;
      color:  #a3c2c2;
      }
      .item i {
      right: 1%;
      top: 30px;
      z-index: 1;
      }
      input[type=radio], input[type=checkbox]  {
      display: none;
      }
      label.radio {
      position: relative;
      display: inline-block;
      margin: 5px 20px 15px 0;
      cursor: pointer;
      }
      .question span {
      margin-left: 30px;
      }
      .question-answer label {
      display: block;
      }
      label.radio:before {
      content: "";
      position: absolute;
      left: 0;
      width: 17px;
      height: 17px;
      border-radius: 50%;
      border: 2px solid #ccc;
      }
      input[type=radio]:checked + label:before, label.radio:hover:before {
      border: 2px solid  #669999;
      }
      label.radio:after {
      content: "";
      position: absolute;
      top: 6px;
      left: 5px;
      width: 8px;
      height: 4px;
      border: 3px solid  #669999;
      border-top: none;
      border-right: none;
      transform: rotate(-45deg);
      opacity: 0;
      }
      input[type=radio]:checked + label:after {
      opacity: 1;
      }
      .flax {
      display:flex;
      justify-content:space-around;
      }
      .btn-block {
      margin-top: 10px;
      text-align: center;
      }
      button {
      width: 150px;
      padding: 10px;
      border: none;
      border-radius: 5px; 
      background:  #669999;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      button:hover {
      background:  #a3c2c2;
      }
      @media (min-width: 568px) {
      .name-item, .city-item {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
      .name-item input, .name-item div {
      width: calc(50% - 20px);
      }
      .name-item div input {
      width:97%;}
      .name-item div label {
      display:block;
      padding-bottom:5px;
      }
      }
    </style>
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





    <div class="testbox">
      <form  method="post"> 
          <h1 style="color: black;">BIKE REPAIRING CENTER</h1>
        <div class="banner">

          <img src="logo.jpg">
        </div>
        <div class="colums">
          <div class="item">
            <label for="name"> First Name<span>*</span></label>
            <input id="name" type="text" name="name" required/>
          </div>
          <div class="item">
            <label for="lname"> Last Name<span>*</span></label>
            <input id="lname" type="text" name="lname" required/>
          </div>
          <div class="item">
            <label for="address1">Address 1<span>*</span></label>
            <input id="address1" type="text"   name="address1" required/>
          </div>
          <div class="item">
            <label for="address2">Address 2<span>*</span></label>
            <input id="address2" type="text"   name="address2" required/>
          </div>
          <div class="item">
            <label for="state">State<span>*</span></label>
            <input id="state" type="text"   name="state" required/>
          </div>
          <div class="item">
            <label for="zip">Zip/Postal Code<span>*</span></label>
            <input id="zip" type="text" name="zip" required/>
          </div>
          <div class="item">
            <label for="city">City<span>*</span></label>
            <input id="city" type="text"   name="city" required/>
          </div>
          <div class="item">
            <label for="eaddress">Email Address<span>*</span></label>
            <input id="eaddress" type="text"   name="eaddress" required/>
          </div>
          <div class="item">
            <label for="phone">Phone<span>*</span></label>
            <input id="phone" type="tel"   name="phone" required/>
          </div>
        </div>


<div class="item">
            <label for="bdetails">Bike Details<span>*</span></label>
            <input id="bdetails" type="text"   name="bdetails" required/>
          </div>

<div class="item">
            <label for="bnum">Bike Number<span>*</span></label>
            <input id="bnum" type="text"   name="bnum" required/>
          </div>


<div class="item">
            <label for="bissue">Bike Problem<span>*</span></label>
            <input id="bissue" type="text"   name="bissue" required/>
          </div>


     <div class="form-group">
                       <input type="file" name="idproof" class="form-control">
                   </div>
    





        <h2>Terms and Conditions</h2>

        <input type="checkbox" name="checkbox1">
        <label>You consent to receive communications from us electronically. We will communicate with you by e-mail or phone. You agree that all agreements, notices, disclosures and other communications that we provide to you electronically satisfy any legal requirement that such communications be in writing.</label>
        <div class="btn-block">
         <button type="submit" name="signup" id="signup" value="Signup">Submit</button>
        </div><br>
       
        </div>
      </form>
    </div>

  </body>
</html>
    </form>
     
  </body>
</html>