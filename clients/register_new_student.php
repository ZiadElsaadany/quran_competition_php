<?php 





include "../db_con.php" ; 
$student_name = "mohamed"; 
$student_age  = 20 ; 
$student_phone ="200"; 
$student_address= "kafr elzayat"; 
$student_study_grade ="A"; 
$student_image_url = "skjbso"; 
$national_id_image_url="d;knd;";
$chalange_id = 15; 
$student_national_id="2002" ; 
$category_name = "quran"; 

$response = new stdClass( );

$select_student  = mysqli_query (  
    $con, 
    "SELECT student.* FROM `student` WHERE student.`student_phone`= '$student_phone' AND
    student.main_category= '$category_name'
     "
);
$select_student_  =mysqli_query(  
    $con , 
    "SELECT student.*,chalange_list.* FROM `student`,`chalange_list` WHERE student.`student_national_id`= '$student_national_id' AND 
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
        `national_id_image_url`, `register_date`, `chalange_id`, `student_national_id`, `main_category`) 
        VALUES
         ( '$student_name', '$student_age', '$student_phone', '$student_address', '$student_study_grade', '$student_image_url', 
         '$national_id_image_url', 
         current_timestamp(), '$chalange_id', '$student_national_id', 
         '$category_name'
         )"
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