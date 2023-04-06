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