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
        
        <form action="" method="post">
       
     <table border="1" height="680" width=100% class="image2"
         style="border-radius:10px;" cellpadding="0">
	
         <tbody align="center">       
        <tr>
   <td>
       
       <table border="1" width=60% bgcolor="#CEECF5"
         style="border-radius:10px;" class="fonte" cellpadding="0">
         <tbody align="center">       
        <tr>
   <td width="100%" colspan="4" height="30">  
           <input name="question" type="text" id="question"
               size="85" height="28" style="width:98%;height:30px;font-size:18px;font-family:serif;text-align: center;background-color:#E9FFAA;" value="<?php echo $rows["title"]; ?>"/>
      </td>
            <td width = "20%" align="center">
            
            <input type="submit" class="fonte" name="Submit"
                   style="font-size:18px;font-family:serif;text-align: center;" 
                   value="Update"/>
            </td>
             </tr>
             
           <tr height="30" algin="center">
             <td width = "20%">
            ID
            </td>
             
                 <td width = "30%">
      Item
            </td>
                 <td width = "10%">
         Number
            
            </td>
                 <td width = "20%">
            
            Update
            </td>
                 <td width = "20%">
            
           Delete
            </td>
                 
             </tr>  
<?php
        $SQL="SELECT * FROM ku.options;";    
        $RES=mysqli_query($co,$SQL);
        while($things = mysqli_fetch_assoc($RES)){
            ?>
             <form id="<?php echo $things["id"] ?>" action="" method="post">
             <tr height="30" class="fonte" align="center">
             <td width = "20%" class="fonte">
          
                 
        <input type="text" name="Id" id="Id" style="width:95%;height:30px;font-size:16px;font-family:serif;
                                                    text-align: center;
                                                    background-color:#CEECF5;
                                                    border:0px" value="<?php echo $things["id"] ?>" readonly="readonly" />
            </td>
             
                 <td width = "30%">
                     <input type="text" name="option" id="option"
                            style="width:95%;height:30px;font-size:16px;font-family:serif;
                                                    text-align: center;
                                   background-color:#E9FFAA;"value="<?php echo $things["option"] ?>"/>
     
            </td>
                 <td width = "10%">
        
            <?php echo $things["number"] ?>
            </td>
                 <td width = "20%">
            
            <input type="submit" value="Update" name="update" style="font-size:18px;font-family:serif;text-align: center;" >
                     
            </td>
                 <td width = "20%">
            
            <input type="button" value="Delete" name="delete" onclick="location.href='?type=delete&id=<?php echo $things["id"] ?>'"
                   style="font-size:18px;font-family:serif;text-align: center;" >
            </td>
                 
             </tr>
                 </form>
<?php
        }
            ?>
         </tbody>     
       </table>
       
       
            </td>
             </tr>
         </tbody>
         
         
            </table>
        </form>
        

        
    </body>
</html>