<?php 
 
include "../db_con.php";
$response = new stdClass(); 
$posts_arr = array(); 
  $select_all_posts = mysqli_query(
$con , 
"SELECT * FROM `posts` ORDER BY `date` DESC "
  );


  while($row = mysqli_fetch_object($select_all_posts)) { 
 
    $posts_arr[] = $row; 
  } 

  $response->status = true; 
  $response->data = $posts_arr; 
  echo json_encode($response) ;


  

?>