<?php
if(isset($_POST['create_post'])){
   
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];
 
    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];

    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_tags'];
    $post_date = date('d-m-y');
    $post_comment_count = 4;

    move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image,
     post_content,post_tags, post_comment_count, post_status)";
     $query .= "VALUES({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}',
      '{$post_content}', '{$post_tags}', '{$post_comment_count}', '{$post_status}')";

      $create_post_query = mysqli_query($conn, $query);

      validateQuery($create_post_query);
}
?>

<form action="" method="post" enctype="multipart/form-data" class="mb-3">
    <div class="form-group mb-3">
        <label for="post_title" class="form-label"><b>Post Title</b></label>
        <input type="text" name="post_title" class="form-control">
    </div>

    <div class="form-group mb-3">
    <label for="post_category" class="form-label"><b>Post Category</b></label>
       <select name="post_category" id="post_category" class="form-control">
        <?php selectCategory(); ?>
       </select>
    </div>

    <div class="form-group mb-3">
        <label for="post_author" class="form-label"><b>Post Author</b></label>
        <input type="text" name="post_author" class="form-control">
    </div>

    <div class="form-group mb-3">
        <label for="post_status" class="form-label"><b>Post Status</b></label>
        <input type="text" name="post_status" class="form-control">
    </div>

    <div class="form-group mb-3">
        <label for="post_image" class="form-label"><b>Post Image</b></label>
        <input type="file" name="post_image" class="form-control">
    </div>

    <div class="form-group mb-3">
        <label for="post_tags" class="form-label"><b>Post Tags</b></label>
        <input type="text" name="post_tags" class="form-control">
    </div>

    <div class="form-group mb-3">
        <label for="post_content" class="form-label"><b>Post Content</b></label>
        <textarea class="form-control" name="post_content" id="post_content" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" name="create_post" class="btn btn-primary" value="Publish Post">
    </div>
</form>