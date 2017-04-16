<?php 
ob_start();
 if(!empty($_POST['submit0'])){ 
  if($_POST['username']=="anqi" && $_POST['password']=="huang"){ 
      session_start();//开启session 
   echo "Login Successfully!"; 
   $_SESSION['username'] = $_POST['username']; 
   header("Location: manager.php"); 
     
   exit(); 
  }else if($_POST['username']=="huang" && $_POST['password']=="anqi"){
      session_start();//开启session 
   echo "Login Successfully!"; 
   $_SESSION['username'] = $_POST['username'];
   header("Location: customer.php");

      exit();
  }
   else{ 
   header("Location: welcome.php?errNum=1"); 
   exit(); 
  } 
 }else{ 
  header("Location: welcome.php?errNum=2"); 
  exit(); 
 } 
 ?>