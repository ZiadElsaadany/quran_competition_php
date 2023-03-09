<?php 

include "../db_con.php" ; 


$student_id=$_GET["id"];
$student_name = $_GET["name"]; 
$student_age = $_GET["age"]; 
$student_phone = $_GET["phone"]; 
$student_address = $_GET["address"];
$response=  new stdClass( ) ;
$arr = array(); 
$select_update_student= mysqli_query(
    $con, //  
    "SELECT * FROM `student` WHERE `student_id` = '$student_id'"           
) ;


$fetch = mysqli_fetch_object( $select_update_student );

if($fetch->student_name == $student_name   && $fetch->student_age  == $student_age && $fetch->student_phone ==$student_phone && $fetch->student_address == $student_address  ) 
{
    $response->status = true; 
    $response->message = "تم تعديل بيانات الطالب بنجاح" ; 

    
    echo json_encode($response); 
}

else { 
    $select_duplicate_phone =  
    
    mysqli_query( 
        $con, 
        "SELECT * FROM student WHERE student_phone ='$student_phone' AND student_id != $student_id"
    )
    ;

    if(mysqli_num_rows($select_duplicate_phone)  == 0 )  { 

$edit_student = mysqli_query(
    $con ,
    "UPDATE `student` SET `student_name` ='$student_name', `student_age` ='$student_age' , `student_phone` = '$student_phone' , `student_address` ='$student_address'
     WHERE `student_id` ='$student_id'"
);


$select_after_update = mysqli_query(  
    $con, 
    "SELECT * FROM `student` WHERE `student_id` =$student_id"
);
$fetch_after_update = mysqli_fetch_object( $select_after_update );


if(mysqli_affected_rows($con) > 0 )  {  
    
    $response->status = true; 
    $response->message = "تم تعديل بيانات الطالب بنجاح" ; 

    
    echo json_encode($response); 
  
}else{  

    $response->status = false; 
    $response->message = "حدثت مشكلة" ; 


    echo json_encode($response); 
}
    
}else{  
    $response->status = false; 
    $response->message = "عذرا لم يتم التعديل يجب ادخال رقم تليفون غير مكرر" ; 

    
    echo json_encode($response); 

 
} 
}
?>