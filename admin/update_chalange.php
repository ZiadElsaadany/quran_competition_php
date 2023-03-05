<?php

   
  include "../db_con.php"  ; 

  $json = file_get_contents('php://input') ; 

$obj = json_decode( $json, true ) ;
  $update_chalange_name  =     $obj["challenge_name"]; 
  $update_availability  =   $obj["availability"]; 
  $update_details =       $obj["details"];
  $category_name = $obj["category_name"];
  $chalange_id= $obj["id"]; 
  $response = new stdClass( )  ; 

  $select_chalanges = mysqli_query( 
    $con, 
    "SELECT * FROM `chalange_list` WHERE `chalange_id` ='$chalange_id'"
   ) ;
$fetch= mysqli_fetch_object(  
  $select_chalanges
);
   if($fetch->chalange_id == $chalange_id &&  $fetch->main_category == $category_name && $fetch->chalange_name == $update_chalange_name && $fetch->chalange_details == $update_details && $fetch->chalange_availability == $update_availability )
    { 

$response->status = true; 
$response->message  = "تم التعديل بنجاح"; 

 echo json_encode( $response);
  
   }
   else { 

  $update_chalanege  = mysqli_query(  
    $con ,
    "UPDATE `chalange_list` SET `main_category`= '$category_name', `chalange_name` ='$update_chalange_name' , `chalange_details` ='$update_details', `chalange_availability` ='$update_availability' WHERE `chalange_id`='$chalange_id' "
  ) ;

   if(mysqli_affected_rows($con)  > 0 )  { 
    

    $response->status = true; 
    $response->message  = "تم التعديل بنجاح";     
        echo json_encode( $response);
   } 
   else {  

    $response->status = false; 
$response->message  = "حدثت مشكلة"; 

    echo json_encode( $response);
  
   }
  }

 


?>