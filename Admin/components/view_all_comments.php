
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Id</th>
      <th>Author</th>
      <th>Comment</th>
      <th>Email</th>
      <th>Status</th>
      <th>In Response to</th>
      <th>Date</th>
      <th>Approve</th>
      <th>Unpprove</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = 'SELECT * FROM comments';
    $select_comments = mysqli_query($conn, $sql);
    $comments = mysqli_fetch_all($select_comments, MYSQLI_ASSOC);
    foreach ($comments as $comment) {
      $comment_id = $comment['comment_id'];
      $comment_post_id = $comment['comment_post_id'];
      $comment_author = $comment['comment_author'];
      $comment_content = $comment['comment_content'];
      $comment_email = $comment['comment_email'];
      $comment_status = $comment['comment_status'];
      $comment_date = $comment['comment_date'];
    

      echo "<tr>";
      echo "<td> $comment_id </td>";

    //   getCatTitle($comment_post_id);

      echo "<td> $comment_author  </td>";
      echo "<td> $comment_content </td>";
      echo "<td> $comment_email </td>";
      echo "<td> $comment_status </td>";

      $query = "SELECT * FROM posts WHERE post_id = {$comment_post_id}";
      $select_post_id = mysqli_query($conn, $query);

      while ($row = mysqli_fetch_assoc($select_post_id)) {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
           
        echo "<td><a href='../post.php?p_id=$post_id'> $post_title </a></td>";
      }


      echo "<td> $comment_date </td>";
      echo "<td><a href='comments.php?approve={$comment_id}'/>Approve</td>";
      echo "<td><a href='comments.php?unapprove={$comment_id}'/>Unapprove</td>";
      echo "<td><a href='comments.php?delete={$comment_id}'/>Delete</td>";
      echo "<tr>";
    }
    ?>


  </tbody>
</table>

<?php
deleteComment();
approveComment();
unapproveComment();
?>