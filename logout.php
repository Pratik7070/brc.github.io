<?php
session_start();
session_destroy();
setcookie('UID','anything',20);
header('Location:adminlogin.php');


?>