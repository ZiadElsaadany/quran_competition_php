<?php 





include "../db_con.php" ; 

$json = file_get_contents('php://input'); 

$obj = json_decode( $json, true );

$student_name = $obj["name"]; 
$student_age  = $obj["age"] ; 
$student_phone =$obj["phone"]; 
$student_address= $obj["address"]; 
$student_study_grade =$obj["study"]; 
$student_image_url = $obj["imageUrl"]; 
$national_id_image_url=$obj["natinoalImageUrl"];
$chalange_id = $obj["challenge_id"]; 
$student_national_id=$obj["nationalId"] ; 
$category_name = $obj["categoryName"]; 
$response = new stdClass();
$select_student  = mysqli_query (  
    $con, 
    "SELECT student.* FROM `student` WHERE student.`student_phone`= '$student_phone' AND
    student.main_category= '$category_name'"
);
$select_student_  =mysqli_query(  
    $con , 
    "SELECT student.*FROM `student` WHERE student.`student_national_id`= '$student_national_id' AND 
    student.main_category= '$category_name'"
    
);

if( mysqli_num_rows($select_student)  > 0   ) { 

$response->status = true; 
$response->message = "يحب ادخال رقم هاتف غير مكرر"; 
    echo json_encode($response );
}else if(mysqli_num_rows($select_student_ ) > 0  ) { 
    $response->status = false;
    $response->message = "يحب ادخال رقم قومي غير مكرر" ; 
  
    echo json_encode($response);
}


else { 
$register_student = mysqli_query(  
    $con, 
    "INSERT INTO `student` (
         `student_name`, `student_age`, `student_phone`, `student_address`, `student_study_grade`, `student_image_url`, 
        `national_id_image_url`, `register_date`, `chalange_id`, `student_national_id`, `main_category`,`accept_student`) 
        VALUES
         ( '$student_name', '$student_age', '$student_phone', '$student_address', '$student_study_grade', '$student_image_url', 
         '$national_id_image_url', 
         current_timestamp(), '$chalange_id', '$student_national_id', 
         '$category_name','0')"
);



if(mysqli_insert_id($con) ) {  
    $response -> status=  true; 
    $response -> message = "تم اضافة الطالب بنجاح"; 

    echo json_encode($response );
}else  {  
    $response -> status=  false; 
    $response -> message = "حدثت مشكلة برجاء اعادة المحاولة"; 

    echo json_encode($response );
}
}




?>