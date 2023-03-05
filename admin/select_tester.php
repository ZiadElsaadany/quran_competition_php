<?php  
 

   include "../db_con.php";

    

$response  =  new stdClass()   ;
   $array_testers = array( );

 $select_tester = mysqli_query(  
   /*
   ahmed
   moahmed
   */
    $con, 
    "SELECT tester_id , tester_name ,tester_phone FROM `testers`  ORDER BY `tester_name` ASC"
 ) ;

while ( $row = mysqli_fetch_object($select_tester))  {  

    $array_testers[ ] = $row ; 

}
$response->status =true;

$response->data = $array_testers;

echo  json_encode(
   $response

); 

 


?>