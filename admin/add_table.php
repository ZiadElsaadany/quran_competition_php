<?php 

$challenge_id = $_GET["challenge_id"]; 
$type = $_GET["type"]; 
$date = $_GET["date"]; 
$time = $_GET["time"]; 

$add_table  = mysqli_query(
    $con, 
    "INSERT INTO `tables_time` (`chalange_id`,  `date`, `type`,`time`) VALUES ('$challenge_id', '$date', '$type',`$time`)" 
);




?>