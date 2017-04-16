<?php
session_start();
?>
<?php 
        if(empty($_SESSION['username'])){ 
     header("Location: welcome.php?errNum=3"); 
  exit(); 
 } 
    

 ?>
<!DOCTYPE HTML>
<html>
    <head>
    <link rel=stylesheet type="text/css" href="ourstyle.css">
    <meta charset="utf-8">
        <title>Voting</title>
    </head>
    <body>
<?php
      
$co=new mysqli("localhost","root","24133571ccA");

if($co->connect_error){
    die("Connection Fail ".$co->connect_error);
}

$SQL="select * from ku.title;";
$rs=mysqli_query($co,$SQL);
    
$rows=mysqli_fetch_assoc($rs);

//echo $rows["title"];
$co->close();

?>
        <?php
        $co=new mysqli("localhost","root","24133571ccA");

if($co->connect_error){
    die("Connection Fail ".$co->connect_error);
}
        
        if(isset($_POST["Submit"])){
            $QUES = $_POST["question"];
            echo $QUES;
            $SQL = "UPDATE `ku`.`title` SET `title`='$QUES' WHERE `tid`='1';";
            //mysqli_query($co,$SQL);
            if($co->query($SQL) == TRUE){
                echo "<script language=javascript>alert('Update Successfully!'); window.location='manager.php';</script>";
                
            }
        }
       // $co->close();
        ?>
        <?php
        $type="";
        if(isset($_POST["update"])){
          
            $OPT = $_POST["option"];
            $ID = $_POST["Id"];     
       
            $SQL = "UPDATE `ku`.`options` SET `option`='$OPT' WHERE `id`='$ID'";
            mysqli_query($co,$SQL);
            echo "<script language=javascript> alert('Update Successfully!'); window.location='manager.php' </script>";
            
        }
        
        ?>
        <?php
        $type="";
        if(isset($_GET["type"])){
            $type=$_GET["type"];
        }
        if($type == "delete"){
            $ID = $_GET["id"];
            $SQL = "DELETE FROM `ku`.`options` WHERE `id`='$ID';";
            mysqli_query($co,$SQL);
            echo "<script language=javascript>alert('Delete Successfully!'); window.locatoin='manager.php'</script>";       
        }
        
        ?>
        <?php
        
        if(isset($_POST["SubmitNew"])){
            $newitem = $_POST["newitem"];
            $SQL = "INSERT INTO `ku`.`options` (`class`, `option`, `number`) VALUES (1, '$newitem', 0);";
            mysqli_query($co,$SQL);
        }
        
        ?>
        
        <form action="" method="post">
       
     <table border="1" height="680" width=100% class="image2"
         style="border-radius:10px;" cellpadding="0">
	
         <tbody align="center">       
        <tr>
   <td>
       
       <table border="5" width=60% bgcolor="#CEECF5"
         style="border-radius:10px;border-color:#644288;" class="fonte" cellpadding="0">
         <tbody align="center">  
             <tr>
                 <td colspan="5" align="center" height="30" border="0" class="bord3"> Administrator: <?php echo $_SESSION['username']?></td>
                 
             </tr>
        <tr>
   <td width="100%" colspan="4" height="30" class="bord2">  
           <input name="question" type="text" id="question"
               size="85" height="28" style="width:98%;height:30px;font-size:18px;font-family:serif;text-align: center;background-color:#EDFDFD;" value="<?php echo $rows["title"]; ?>"/>
      </td>
            <td width = "20%" align="center" class="bord2">
            
            <input type="submit" class="fonte" name="Submit"
                   style="font-size:18px;font-family:serif;text-align: center;" 
                   value="Update"/>
            </td>
             </tr>
             
           <tr height="30" algin="center">
             <td width = "20%" class="bord1">
            ID
            </td>
             
       <td width = "40%" class="bord1">
      Item
                 </td>
                 <td width = "10%" class="bord1">
         Number
            
            </td>
                 <td width = "15%" class="bord1">
            
            Update
            </td>
              
                 <td width = "15%" class="bord1">
            
           Delete
            </td>
                 
             </tr>  
<?php
        $SQL="SELECT * FROM ku.options;";    
        $RES=mysqli_query($co,$SQL);
        while($things = mysqli_fetch_assoc($RES)){
            ?>
             <form id="<?php echo $things["id"] ?>" action="" method="post">
             <tr height="30" class="fonte" align="center" border="0">
             <td width = "20%" class="bord2">
          
                 
        <input type="text" name="Id" id="Id" style="width:95%;height:30px;font-size:16px;font-family:serif;
                                                    text-align: center;
                                                    background-color:#CEECF5;
                                                    border-style:none;
                                                    " value="<?php echo $things["id"] ?>" readonly="readonly" />
            </td>
             
                 <td width = "40%" class="bord2">
                     <input type="text" name="option" id="option"
                            style="width:95%;height:30px;font-size:16px;font-family:serif;
                                                    text-align: center;
                                   background-color:#EDFDFD;"value="<?php echo $things["option"] ?>"/>
     
            </td>
                 <td width = "10%" class="bord2">
        
            <?php echo $things["number"] ?>
            </td>
                 <td width = "15%" class="bord2">
            
            <input type="submit" value="Update" name="update" style="font-size:18px;font-family:serif;text-align: center;" >
                     
            </td>
                 <td width = "15%" class="bord2">
            
            <input type="button" value="Delete" name="delete" onclick="location.href='?type=delete&id=<?php echo $things["id"] ?>'"
                   style="font-size:18px;font-family:serif;text-align: center;" >
            </td>
                 
             </tr>
                 </form>
<?php
        }
            ?>
             <tr>
                 <td width="100%" colspan="3" align="center" class="bord1"><input width="100%" name="newitem" type="text"  size="85" height="28" style="width:98%;height:30px;font-size:18px;font-family:serif;text-align: center;background-color:#EDFDFD;" id="newitem" />
</td>
                 <td width="20%" class="bord1" colspan="2"><input type="submit" name="SubmitNew" value="Add New Item" style="font-size:18px;font-family:serif;text-align: center;"  align="center"/></td>
             </tr>
            <tr>
          <?php      
                if(isset($_GET['tz'])=='exit'){
                    session_destroy();
                    echo "<script language='javascript'>alert('Exit Successfully'); window.location='welcome.php'</script>";
                    
                }
                ?>
                 <td colspan="5" class="bord2">
                     <a href="?tz=exit">EXIT</a>
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