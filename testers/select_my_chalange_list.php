<?php 

// select all challenges --> availability = 1

include "../db_con.php" ; 
$my_chalange_list = array( );


$tester_id =$_GET["id"]; 
$response = new stdClass();

$select_my_challenge =mysqli_query( 
    $con , 
    "SELECT * FROM `chalange_list` WHERE  `tester_id` = '$tester_id' AND `chalange_availability` = 1"
);
while($row  = mysqli_fetch_object($select_my_challenge)) {  

$my_chalange_list [] = $row ;
 }

 $response->status = true; 
 $response->data = $my_chalange_list ;
 echo    json_encode($response);
?>  