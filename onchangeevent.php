<?php
# form handling  
# how to take input from user and get it into php
include("cc.php"); # here we attach connection file using include function.
$arr=array('errortype'=>0,'msg'=>'');

if(isset($_POST['signup'])){
  # how to get data from OUR FORM

  #$name=$_POST['name'];

  $state =mysqli_real_escape_string($con,$_POST['state']);
  $city =mysqli_real_escape_string($con, $_POST['city']);  
    $q="select * from state where state='$state'";

   $r=mysqli_query($con,$q);
   // $date=date('Y-m-d h:i:s'); 
 $r=mysqli_query($con,$q); 
   if(mysqli_num_rows($r)==1){
    $arr=array('errortype'=>1,'msg'=>'User Already Exist');

   }else{
       $q="insert into state(state,city)values('$state','$city')";
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
    <title>this is onload event</title>
  </head>
  <body style="    margin-top: 204px;
    /* justify-content: center; */
    margin-left: 600px;">
    <form method="post">
      
          <input class="input100" type="text" name="state" placeholder="state">

          <input class="input100" type="text" name="city" placeholder="city">

                    <button type="submit" name="signup" id="signup" value="signup">Insert</button>  

    </form>
<br>

    <select onchange="getcity(this.value)">
      <option>--select state--</option>
      <option value="bihar">bihar</option>
      <option value="up">Uttar Pradesh</option>
      <option value="Jharkhand">Jharkhand</option>
    </select>

    <div id="city"></div>

    <script type="text/javascript">
      var html="<select><option>select here</option>";
      function getcity(v){
        biharcity=['<?php echo $_SESSION['sessdata']['name'];  ?>','m'];
        upcity=['luknow','varanasi'];
        Jkcity=['ranchi','dhanbad']
        for(i=0;i<biharcity.length;i++){
        if(v=='bihar'){
          html+="<option value="+biharcity[i]+">"+biharcity[i]+"</option>"
        }
      }
      // html+="</select>";
       // document.write(html)
       for(i=0;i<upcity.length;i++){
        if(v=='up'){
          html+="<option value="+upcity[i]+">"+upcity[i]+"</option>"
        }
      }
      // html+="</select>";
       // document.write(html)
     
        for(i=0;i<Jkcity.length;i++){

        if(v=='Jharkhand')
          html+="<option value="+Jkcity[i]+">"+Jkcity[i]+"</option>"

      }
      html+="</select>";
       document.getElementById('city').innerHTML=html;
}

    </script>

  </body>
</html>