<!DOCTYPE HTML>
<html>
    <head>
    <link rel=stylesheet type="text/css" href="mystyle.css">
    <meta charset="utf-8">
        <title>Voting</title>
    </head>
    <body>

        
        <form action="" method="post">
       
     <table border="0" height="680" width=100% class="image1" style="border-radius:10px;" cellpadding="0">
<?php
$co=new mysqli("localhost","root","24133571ccA");

if($co->connect_error){
    die("Connection Fail ".$co->connect_error);
}

$SQL="select * from ku.title;";
$rs=mysqli_query($co,$SQL);
$rows=mysqli_fetch_assoc($rs);


echo $rows["title"];
$co->close();

?>	
            </table>
        </form>
    </body>
</html>