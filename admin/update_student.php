<?php 

include "../db_con.php" ; 

$student_id=6;
$student_name = 'youssef 2 '; 
$student_age = 20 ; 
$student_phone = "1"; 
$student_address = "nvkv";
$select_update_student= mysqli_query(
    $con, //  
    "SELECT * FROM `student` WHERE `student_id` = '$student_id'"           
) ;



$fetch = mysqli_fetch_object( $select_update_student );
if($fetch->student_name == $student_name   && $fetch->student_age  == $student_age && $fetch->student_phone ==$student_phone && $fetch->student_address == $student_address  ) 
{
    $map = [ 
        "status"=>"true",
        "message"=>"تم تعديل بيانات الطالب بنجاح", 
        "data" => $fetch

    ]  ;
    echo json_encode($map); 
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
    "UPDATE `student` SET `student_name` ='$student_name', `student_age` ='$student_age' , `student_phone` = '$student_phone' , `student_address` ='$student_address'  WHERE `student_id` ='$student_id'"
);


$select_after_update = mysqli_query(  
    $con, 
    "SELECT * FROM `student` WHERE `student_id` =$student_id"
);
$fetch_after_update = mysqli_fetch_object( $select_after_update );


if(mysqli_affected_rows($con) > 0 )  {  
    
    $map = [
        "status"=>"true",
        "message"=>"تم تعديل بيانات الطالب بنجاح", 
        "data" => $fetch_after_update

    ]  ;
    echo json_encode($map); 
}else{  
    $map = [ 
        "status"=>"false",
        "message"=>"حدثت مشكلة", 
        "data" => $fetch

    ]  ;
    echo json_encode($map); 
}
    
}else{  
    $map = [ 
        "status"=>"false",
        "message"=>"عذرا لم يتم التعديل يجب ادخال رقم تليفون غير مكرر", 
        "data" => $fetch

    ]  ;
    echo json_encode($map); 
 
} 

}
?>