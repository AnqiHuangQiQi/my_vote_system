<?php
$co=new mysqli("localhost","root","24133571ccA");

if($co->connect_error){
    die("Connection Fail ".$co->connect_error);
}

$SQL1="INSERT INTO `ku`.`options` (`id`, `class`, `option`,`number`) VALUES ('1002', '1','The Twilight Saga', '0');";

$SQL2="INSERT INTO `ku`.`options` (`id`, `class`, `option`,`number`) VALUES ('1003', '1','Titanic', '0');";

$SQL3="INSERT INTO `ku`.`options` (`id`, `class`, `option`,`number`) VALUES ('1004', '1','The Transformer', '0');";

$SQL4="INSERT INTO `ku`.`options` (`id`, `class`, `option`,`number`) VALUES ('1005', '1','Pirates of the Caribbean', '0');";
$SQL5="INSERT INTO `ku`.`options` (`id`, `class`, `option`,`number`) VALUES ('1005', '1','Jurassic Park', '0');";

$co->query($SQL1);
$co->query($SQL2);
$co->query($SQL3);
$co->query($SQL4);
$co->query($SQL5);

$co->close();
?>