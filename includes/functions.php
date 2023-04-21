<?php
function validateQuery($result){
    global $conn;
    if (!$result){
           
      die ('QUERY FAILED.' . mysqli_error($conn));
  }
  }

?>