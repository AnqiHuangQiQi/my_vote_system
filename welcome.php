<!DOCTYPE HTML>
<html>
    <head>
    <link rel=stylesheet type="text/css" href="mystyle.css">
    <meta charset="utf-8">
        <title>Voting</title>
    </head>
    <body>
       <?php
      
if(isset($_POST['submit0'])){
  if($_POST['password']=='huang' && $_POST['username']='anqi'){

    $_SESSION['password']=$_POST['password'];
    $_SESSION['username']=$_POST['username'];

   echo "<script language=javascript>alert('Login Successfully!');window.location='manager.php'</script>";
      
  }
    else if($_POST['password']=='anqi' && $_POST['username']='huang'){
        echo "<script language=javascript>alert('Login Successfully!');window.location='customer.php'</script>";
    }
  else{
    echo "<script language=javascript>alert('Cannot Login, please check your username and password');window.location='welcome.php'</script>";
  }
}
?> 
      
    <form action="" method="post">
       
     <table border="0" height="680" width=100% class="image1" style="border-radius:10px;" cellpadding="0">
<tbody>       
        <tr>
   <td>
       <table width="40%" border="0" align="center" bgcolor="#E0F8F7" style="border-radius:10px;">
           <tbody valign="middle"> 
           <tr>
   <td>
            <table width="100%" border="0" height="40" align="center" bgcolor="#E0F8F7" >
            <tr align="center">
                <td><label class="font1"> Voting System </label></td>
            </tr>
            </table>
            <table width="100%" border="0" height="80" align="center" bgcolor="#F4ECF7" class="font2">
            <tr>
                <td width="40%" align="right">
                <label> Username: </label>    
                </td>
                <td width="60%" align="left">
                    <input name="username" id="username" type="text" style="border-radius:5px;"/>
                </td>
            </tr>
            <tr>
                <td width="40%" align="right">
                <label> Password: </label>    
                </td>
                <td width="60%" align="left">
                    <input name="password" id="password" type="text"
                           style="border-radius:5px;"/>
                </td>
            </tr>
            </table>
            <table width="100%" border="0" height="40" align="center" bgcolor="#F4ECF7">
            <tr>
                <td align="right">
                <label>
                    <input name="submit0"  class="font2" type="submit" id="submit0" value="Login"/>
                </label>
                </td>
                <td align="left">
                <label>
                    <input name="reset"  class="font2" type="reset" id="reset0" value="Reset"/>
                </label>
                </td>
            </tr>
            </table>
            <tr>
            </tr>
       
       </td>
  </tr>
       </tbody>
</table>  
            </td>
  </tr>
       </tbody>
</table>  
           
        
    </form>
         
   
    
  
        
    </body>
     
</html>