<?php

include 'admin_database.php';

// Function to delete category form categories.php //
function deleteCategory(){
  global $conn;
  
  if (isset($_GET['delete'])) {
    $get_cat_id = $_GET['delete'];
  
    $query = "DELETE FROM categories WHERE category_id = {$get_cat_id} ";
    $delete_query = mysqli_query($conn, $query);

    if ($delete_query) {
      //Success
      header('Location: categories.php');
  } else {
      //Error
      echo 'Error: ' . mysqli_error($conn);
  }
  }
}
?>