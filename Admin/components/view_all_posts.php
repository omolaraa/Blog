
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Id</th>
      <th>Author</th>
      <th>Title</th>
      <th>Category</th>
      <th>Status</th>
      <th>Image</th>
      <th>Tags</th>
      <th>Comments</th>
      <th>Date</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = 'SELECT * FROM posts';
    $select_posts = mysqli_query($conn, $sql);
    $posts = mysqli_fetch_all($select_posts, MYSQLI_ASSOC);
    foreach ($posts as $post) {
      $post_id = $post['post_id'];
      $post_author = $post['post_author']; 
      $post_title = $post['post_title'];
      $post_category_id = $post['post_category_id'];
      $post_status = $post['post_status'];
      $post_image = $post['post_image'];
      $post_tags = $post['post_tags'];
      $post_comment_count = $post['post_comment_count'];
      $post_date = $post['post_date'];

      echo "<tr>";
      echo "<td> $post_id </td>";
      echo "<td> $post_author </td>";
      echo "<td> $post_title </td>";

      getCatTitle($post_category_id);

      echo "<td> $post_status </td>";
      echo "<td> <img class='img-responsive' width='100' height='60' src='../images/$post_image' alt='image'> </td>";
      echo "<td> $post_tags </td>";
      echo "<td> $post_comment_count </td>";
      echo "<td> $post_date </td>";
      echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'/>Edit</td>";
      echo "<td><a href='posts.php?delete={$post_id}'/>Delete</td>";
      echo "<tr>";
    }
    ?>


  </tbody>
</table>

<?php
deletePost();
?>