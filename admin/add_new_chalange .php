<?php

 
 
 
 include "../db_con.php"; 



 $chalange_name = " ah 55 " ; 
 $chalange_details= ">18"; 
 $chalange_availability = 1; 
 $category_name = "hadeth" ; 
 $response = new stdClass( ); 

 $select_dublicate_chalange = mysqli_query(
$con , 
"SELECT * FROM `chalange_list` WHERE `chalange_name` ='$chalange_name' "
 ) ;

 if(mysqli_num_rows($select_dublicate_chalange) >0){  


    $response->status= true; 
    $response->message= "تم اضافة هذه المسابقة من قبل"; 


    echo json_encode($response);
  }else{ 

  $insert_chalange =  mysqli_query( 
    $con, 
    "INSERT INTO `chalange_list` (`chalange_name`, `chalange_details`, `chalange_availability`,`main_category`) 
    VALUES ( '$chalange_name', '$chalange_details', '$chalange_availability' ,'$category_name')"
  );

 if(mysqli_insert_id($con)){ 

  $select = mysqli_query(  
    $con, 
    "SELECT * FROM `chalange_list` WHERE `chalange_name`= '$chalange_name'"
  );

  $fetch = mysqli_fetch_object( $select) ;

  $response->status = true; 
  $response->message= "تم اضافة المسابقة بنجاح"; 
  $response->data= $fetch; 
 
    echo json_encode($response);
 }else { 

  $response->status = false; 
  $response->message= "حدثت مشكلة";  
    echo json_encode($response);

  }

  }


?>