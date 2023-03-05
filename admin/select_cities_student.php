<?php 


include "../db_con.php";


 
$all_cities_student_array = array( ); 

$select_all_cities = mysqli_query(


    $con , 

    "SELECT `student_address` , `student_name` ,`student_id`,`student_image_url`, `chalange_id` FROM  `student` "
) ; 


while( $dataRow = mysqli_fetch_object($select_all_cities) ) {
    
    $all_cities_student_array [] = $dataRow; 

}

echo   json_encode( $all_cities_student_array); 



?>