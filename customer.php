<!DOCTYPE HTML>
<html>
    <head>
    <link rel=stylesheet type="text/css" href="customer.css">
    <meta charset="utf-8">
        <title>Vote Center</title>
    </head>
    <body>
        
         <form action="" method="post">
             <table border="0" height="680" width=100% class="image3"
         style="border-radius:10px;" cellpadding="0">
                 
       <tbody align="center" width="50%">  
           <tr><td>
           <table width=40% border="0" style="border-radius:10px;">
               <tr>
                   <td colspan="2" align="center" class="border"> VOTE CENTER </td>
               </tr>
               
        <?php
                 $co=new mysqli("localhost","root","24133571ccA");

if($co->connect_error){
    die("Connection Fail ".$co->connect_error);
}
        $SQL="SELECT * FROM ku.options;";    
        $RES=mysqli_query($co,$SQL);
        while($things = mysqli_fetch_assoc($RES)){
            ?>
               
            
            <tr colspan="2" class="fonte" >
    <td bgcolor="#FBEFFB" colspan="2" style="border-radius:7px;"><input type="radio" name="item"  value="<?php echo $things["id"]?>" />  
      <?php echo $things["option"]?></td>
  </tr>
            <?php } ?>
            
               <?php
            
            if(isset($_POST["sub"])){
                
                //if($_SESSION["vote"]==session_id()){
                    ?>
                    <script language="javascript">
     // alert("You have already voted.");
                      
      //location.href="welcome.php";
    </script>
               <?php
               // }
                //else{
                $id = $_POST["item"];
                $sqll = "UPDATE `ku`.`options` SET `number`=`number`+1 WHERE `id`='$id';";
                mysqli_query($co,$sqll);
                //session_destroy();
                ?>
               
                <script language="javascript">
                location.href="welcome.php";
                 </script>
               <?php
                //}
            }
            
            ?>
             <tr>
                <td width="42%" align="right"> <input type="submit" name="sub" value="Vote" style="font-size:20px;font-family:serif;text-align: center;"/>
                 </td>
                 <td width="58%"><input type="submit" name="view" value="View Results" style="font-size:20px;font-family:serif;text-align: center;"/></td>
                 </tr>
  </table>
               </td></tr>
                 </tbody>
             </table>
       
        </form>
        
        
    </body>
</html>