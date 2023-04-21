<?php

include 'admin_database.php';

// Function to display all categories;  categories.php //
function displayCategories()
{
  global $conn;

  $sql = 'SELECT * FROM categories';
  $select_categories = mysqli_query($conn, $sql);
  $categories = mysqli_fetch_all($select_categories, MYSQLI_ASSOC);

  foreach ($categories as $category) :
    echo "<tr>"; 
    echo "<td> {$category['category_id']} </td>";
    echo "<td> {$category['category_title']} </td>";
    echo "<td><a href='categories.php?delete={$category['category_id']}'>Delete</a></td>";
    echo "<td><a href='categories.php?edit={$category['category_id']}'>Edit</a></td>";
    echo "<tr>";
 
  endforeach;
}

// Function to add category;  categories.php //
function addCategory(){
  global $conn;

  if (isset($_POST['submit'])) {
      $cat_title = filter_input(INPUT_POST, 'cat_title', FILTER_SANITIZE_SPECIAL_CHARS);

      if ($cat_title == "" || empty($cat_title)) {
          $titleErr = 'Title is required';
      } else {
          $query = "INSERT INTO categories (category_title) VALUES ('$cat_title')";
          $create_category_query = mysqli_query($conn, $query);

          if ($create_category_query) {
              //Success
              header('Location: categories.php');
          } else {
              //Error
              echo 'Error: ' . mysqli_error($conn);
          }
      }
  };
  ?>
  <input type="text" name="cat_title" class="form-control <?php echo $titleErr ? 'is-invalid' : null; ?>">
  <div class="invalid-feedback">
      <?php echo $titleErr; ?>
  </div>
  <?php } ?>

  <?php

// Function to delete category; categories.php //
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

// Function to update category; update_categories.php //
function updateCategory($get_cat_id, $updated_cat_title){
  global $conn;
  
        $query = "UPDATE categories SET category_title = '{$updated_cat_title}' WHERE category_id = {$get_cat_id}";
        $update_query = mysqli_query($conn, $query);
  
        if ($update_query) {
            //Success
            header('Location: categories.php');
        } else {
            //Error
            echo 'Error: ' . mysqli_error($conn);
        }
      }
?>

<?php

function validateQuery($result){
  global $conn;
  if (!$result){
         
    die ('QUERY FAILED.' . mysqli_error($conn));
}
}

///////////////////////////////////////// POSTS FUNCTIONS ///////////////////////////////////////////////////////////
// Function to link category_id to post_category_id and get the category title 
//-- Relational Database; view_all_posts.php //
function getCatTitle($post_category_id){
  global $conn;
   // Search for the category_id value from categories that matches the post_category_id value in the posts table
   $query = "SELECT * FROM categories WHERE category_id = {$post_category_id}";
   $select_categories_id = mysqli_query($conn, $query);
   // When the category_id with a match has been found, get the name of the category linked to it's id.
   while ($row = mysqli_fetch_assoc($select_categories_id)) {
     $cat_title = $row['category_title'];
     
     // Display the title of the category instead of the category_id

     echo "<td> $cat_title </td>";
   }
}

// Function to delete post; view_all_posts.php 
function deletePost(){
  global $conn;
  if (isset($_GET['delete'])) {
    $get_post_id = $_GET['delete'];
  
    $query = "DELETE FROM posts WHERE post_id = {$get_post_id} ";
    $delete_query = mysqli_query($conn, $query);
  
  
    if ($delete_query) {
      //Success
      header('Location: posts.php');
    } else {
      //Error
      echo 'Error: ' . mysqli_error($conn);
    }
  }
  
} 

// Function to select a category from options of categories
//display options of categories ; edit_posts.php
function selectCategory(){
  global $conn;
  $query = "SELECT * FROM categories";
  $select_categories = mysqli_query($conn, $query);

  validateQuery($select_categories);

  while ($row = mysqli_fetch_assoc($select_categories)) {
      $cat_id = $row['category_id'];
      $cat_title = $row['category_title'];

      echo "<option value='{$cat_id}'>{$cat_title}</option>";
  }

}
///////////////////////////////////////// COMMENTS FUNCTIONS ///////////////////////////////////////////////////////////

// Function to delete post; view_all_posts.php 
function deleteComment(){
  global $conn;
  if (isset($_GET['delete'])) {
    $get_comment_id = $_GET['delete'];
  
    $query = "DELETE FROM comments WHERE comment_id = {$get_comment_id} ";
    $delete_query = mysqli_query($conn, $query);
  
  
    if ($delete_query) {
      //Success
      header('Location: comments.php');
    } else {
      //Error
      echo 'Error: ' . mysqli_error($conn);
    }
  }
  
} 

function approveComment(){
  global $conn;
  if (isset($_GET['approve'])) {
    $get_comment_id = $_GET['approve'];
  
    $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $get_comment_id";
    $approve_comment_query = mysqli_query($conn, $query);
  
  
    if ($approve_comment_query) {
      //Success
      header('Location: comments.php');
    } else {
      //Error
      echo 'Error: ' . mysqli_error($conn);
    }
  }
  
} 

function unapproveComment(){
  global $conn;
  if (isset($_GET['unapprove'])) {
    $get_comment_id = $_GET['unapprove'];
  
    $query = "UPDATE comments SET comment_status = 'unapproved ' WHERE comment_id = $get_comment_id";
    $unapprove_comment_query = mysqli_query($conn, $query);
  
  
    if ($unapprove_comment_query) {
      //Success
      header('Location: comments.php');
    } else {
      //Error
      echo 'Error: ' . mysqli_error($conn);
    }
  }
  
} 


?>