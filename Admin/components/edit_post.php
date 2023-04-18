<?php
// Select specific post to edit by post_id
if(isset($_GET['p_id'])){
   $get_post_id = $_GET['p_id'];

  }
  $sql = "SELECT * FROM posts WHERE post_id = {$get_post_id} ";
  $select_posts_by_id= mysqli_query($conn, $sql);

// Use $post from the database to set values from chosen blog post into the edit form
  while ($post = mysqli_fetch_assoc($select_posts_by_id)) {
    $post_id = $post['post_id'];
    $post_author = $post['post_author'];
    $post_title = $post['post_title'];
    $post_category_id = $post['post_category_id'];
    $post_status = $post['post_status'];
    $post_image = $post['post_image'];
    $post_content = $post['post_content'];
    $post_tags = $post['post_tags'];
 
}

// Action to be taken when the update_post button is clicked

if(isset($_POST['update_post'])){
   
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];
 
    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];

    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];


    move_uploaded_file($post_image_temp, "../images/$post_image");

// If after submission, post_image is empty/ there is no image displayed, get the image from the database
    if(empty($post_image)){
        $query = "SELECT * FROM posts WHERE post_id = {$get_post_id} ";
        $select_image = mysqli_query($conn, $query);
      
        while ($post = mysqli_fetch_assoc($select_image)) {
            $post_image = $post['post_image'];

    }
}

// Update the database with the new form values
    $query = "UPDATE posts SET ";
    $query .= "post_title = '{$post_title}', ";
    $query .= "post_category_id = '{$post_category_id}', ";
    $query .= "post_date = now(), ";
    $query .= "post_author = '{$post_author}', ";
    $query .= "post_status = '{$post_status}', ";
    $query .= "post_tags = '{$post_tags}', ";
    $query .= "post_content = '{$post_content}', ";
    $query .= "post_image = '{$post_image}' ";
    $query .= "WHERE post_id = {$get_post_id}";

    $update_post = mysqli_query($conn, $query);
    validateQuery($update_post);
}

  
?>

<form action="" method="post" enctype="multipart/form-data" class="mb-3">
    <div class="form-group mb-3">
        <label for="post_title" class="form-label"><b>Post Title</b></label>
        <input value="<?php echo $post_title; ?>" type="text" name="post_title" class="form-control">
    </div>

    <div class="form-group mb-3">
    <label for="post_category" class="form-label"><b>Post Category</b></label>
       <select name="post_category" id="post_category" class="form-control">
        <?php selectCategory(); ?>
       </select>
    </div>

    <div class="form-group mb-3">
        <label for="post_author" class="form-label"><b>Post Author</b></label>
        <input value="<?php echo $post_author; ?>" type="text" name="post_author" class="form-control">
    </div>

    <div class="form-group mb-3">
        <label for="post_status" class="form-label"><b>Post Status</b></label>
        <input value="<?php echo $post_status; ?>" type="text" name="post_status" class="form-control">
    </div>

    <div class="form-group mb-3">
        <label for="post_image" class="form-label"><b>Post Image</b></label>
        <div class="form-control">
        <img src="../images/<?php echo $post_image; ?>" alt="image" width="100" >
        <input type="file" name="post_image">
        </div>
    </div>

    <div class="form-group mb-3">
        <label for="post_tags" class="form-label"><b>Post Tags</b></label>
        <input value="<?php echo $post_tags; ?>" type="text" name="post_tags" class="form-control">
    </div>

    <div class="form-group mb-3">
        <label for="post_content" class="form-label"><b>Post Content</b></label>
        <textarea  class="form-control" name="post_content" id="post_content" cols="30" rows="10">  <?php echo $post_content; ?> </textarea>
    </div>
    <div class="form-group">
        <input type="submit" name="update_post" class="btn btn-primary" value="Update Post">
    </div>
</form>