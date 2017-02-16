<?php
$co=new mysqli("localhost","root","24133571ccA");

if($co->connect_error){
    die("Connection Fail ".$co->connect_error);
}

$mysql = "CREATE DATABASE ku";
$SQL = "CREATE TABLE `ku`.`options` (
  `id` INT(10) NOT NULL,
  `class` INT(10) NULL DEFAULT NULL,
  `option` VARCHAR(200) NULL DEFAULT NULL,
  `number` INT(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))ENGINE=InnoDB AUTO_INCREMENT=1001 DEFAULT CHARSET=utf8;";

if($co->query($mysql) == TRUE && $co->query($SQL)){
    echo "Database is created successfully.";
}else{
    echo "Fail to create the database: ".$co->error;
}

$co->close();
?>	