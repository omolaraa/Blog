<?php include 'components/header.php'; ?>


<section class="cover-page p-5 p-lg-0 pt-lg-5 mt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 p-3">
                <?php

                if (isset($_GET['p_id'])) {
                    $get_post_id = $_GET['p_id'];
                }

                $sql = "SELECT * FROM posts WHERE post_id = $get_post_id";
                $select_posts = mysqli_query($conn, $sql);
                $posts = mysqli_fetch_all($select_posts, MYSQLI_ASSOC);

                if (empty($posts)) { ?>
                    <p class="col-md-12 mt-3">Empty posts</p>
                <?php }

                foreach ($posts as $post) :
                    $post_id = $post['post_id'];
                    $post_author = $post['post_author'];
                    $post_title = $post['post_title'];
                    $post_category_id = $post['post_category_id'];
                    $post_status = $post['post_status'];
                    $post_image = $post['post_image'];
                    $post_content = $post['post_content'];
                    $post_date = $post['post_date'];
                ?>

                    <h1 class="page-header">
                        Page Heading
                        <small>Secondary Text</small>
                    </h1>
                    <h2><a href="#"> <?php echo $post_title; ?> </a></h2>
                    <p class="lead">by <a href="index.php"><?php echo $post_author; ?></a></p>
                    <p><span class="glyphicon glyphicon-time"></span>Posted on <?php echo $post_date; ?> at 10:00 PM</p>
                    <hr>
                    <img src="images/<?php echo $post_image; ?>" alt="img" class='img-responsive' width='700' height='400'>
                    <hr>
                    <p><?php echo $post_content; ?></p>
                <?php endforeach; ?>

                <?php
                if (isset($_POST['create_comment'])) {
                    $get_post_id = $_GET['p_id'];

                    $comment_author = $_POST['comment_author'];
                    $comment_email = $_POST['comment_email'];
                    $comment_content = $_POST['comment_content'];

                    $query = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";
                    $query .= "VALUES({$get_post_id}, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved', now())";

                    $create_comment_query = mysqli_query($conn, $query);

                    validateQuery($create_comment_query);
                }

                ?>

                <div class="mb-5 mt-3 bg-light p-4 mt-5">
                    <h6>Leave a Comment:</h6>
                    <form action="" method="post" class="mb-4">
                        <div class="form-group mb-3">
                            <label for="comment_author" class="form-label">
                                <b> Author</b>
                            </label>
                            <input type="text" name="comment_author" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="comment_email" class="form-label">
                                <b> Email</b>
                            </label>
                            <input type="email" name="comment_email" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="comment_content" class="form-label">
                                <b> Comment</b>
                            </label>
                            <textarea class="form-control" name="comment_content" id="post_content" cols="30" rows="5">   </textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="create_comment" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                </div>

                <?php
                $query = "SELECT * FROM comments WHERE comment_post_id = {$get_post_id} AND comment_status = 'approved' ";
                $query .= "ORDER BY comment_id DESC";
                $select_comments_query = mysqli_query($conn, $query);
                validateQuery($select_comments_query);

                while ($comment = mysqli_fetch_assoc($select_comments_query)) {
                    $comment_date = $comment['comment_date'];
                    $comment_author = $comment['comment_author'];
                    $comment_content = $comment['comment_content'];
                    ?>

                    <div class="mb-3">
                    <div class="row g-0 align-items-center">
                        <div class="col-md-1">
                            <img src="https://via.placeholder.com/64x64" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-11">
                            <div class="card-body">
                                <h5 class="card-title"> <?php echo $comment_author; ?> <small class="text-muted"><?php echo $comment_date; ?> at 5:30 PM</small></h5>
                                <p class="card-text"><?php echo $comment_content; ?></p>
                            </div>
                        </div>

                    </div>

                </div>
              <?php  } ?>
               
                <!-- <div class="mb-3">
                    <div class="row g-0 ">
                        <div class="col-md-1">
                            <img src="https://via.placeholder.com/64x64" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-11">
                            <div class="card-body">
                                <h5 class="card-title">Lizzy Lohan <small class="text-muted">August 24, 2020 at 5:30 PM</small></h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>

                                <div class="row g-0 align-items-center">
                        <div class="col-md-1">
                            <img src="https://via.placeholder.com/64x64" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-11">
                            <div class="card-body">
                                <h5 class="card-title">Lizzy Lohan <small class="text-muted">August 24, 2020 at 5:30 PM</small></h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>

                    </div>
                            </div>
                        </div>

                    </div>

                </div> -->
            </div>
            <div class="col-md-4 p-3">
                <?php include 'components/sidebar.php'; ?>

            </div>

        </div>
    </div>
</section>

<?php include 'components/footer.php'; ?>