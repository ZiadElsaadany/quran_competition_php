<?php
 

  include "../db_con.php"; 

  $availability  =  1 ;
  $chalange_id= 2; 

$select_chalanges = mysqli_query(  
    $con , 
    "SELECT * FROM `chalange_list` WHERE `chalange_id` ='$chalange_id'"
) ;

$fetch = mysqli_fetch_object(
    $select_chalanges 
 );
  
 if( $fetch->chalange_availability == $availability  ) {  


    echo "updated"; 


 } else {  
$update_chalange = mysqli_query(  
    $con, 
    "UPDATE `chalange_list` SET `chalange_availability` = '$availability' WHERE `chalange_list`.`chalange_id` ='$chalange_id'"
  );   
   
  if(mysqli_affected_rows($con)) {  

    echo "updated";

  }else{ 
    echo "error"; 
   }

 }

  
  
 

 


?>