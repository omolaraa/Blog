<?php include 'components/header.php'; ?>


<section class="cover-page p-5 p-lg-0 pt-lg-5 mt-5">
    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <?php
                if (isset($_POST['submit'])) {
                    $search =  $_POST['search'];
                    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
                    $search_query = mysqli_query($conn, $query);

                    if (!$search_query) {
                        die("Query Failed" . mysqli_error($conn));
                    }

                    $count = mysqli_num_rows($search_query);
                     
                    if ($count == 0) {
                        echo "<h1> No result <h1>";
                    } else {
                        $posts = mysqli_fetch_all($search_query, MYSQLI_ASSOC);
        
                        if (empty($posts)) : ?>
                            <p class="col-md-12 mt-3">Empty posts</p>
                        <?php endif; ?>
                        <?php foreach ($posts as $post) :
                            $post_id = $post['post_id'];
                            $post_author = $post['post_author'];
                            $post_title = $post['post_title'];
                            $post_category_id = $post['post_category_id'];
                            $post_status = $post['post_status'];
                            $post_image = $post['post_image'];
                            $post_content = substr( $post['post_content'],0,100);
                            $post_date = $post['post_date'];
                        ?>
        
                            <h1 class="page-header">
                                Page Heading
                                <small>Secondary Text</small>
                            </h1>
                            <h2><a href="post.php?p_id=<?php echo $post_id ?>" class="nav-link"> <?php echo $post_title; ?> </a></h2>
                            <p class="lead">by <a href="index.php"><?php echo $post_author; ?></a></p>
                            <p><span class="glyphicon glyphicon-time"></span>Posted on <?php echo $post_date; ?> at 10:00 PM</p>
                            <hr>
                            <img src="images/<?php echo $post_image; ?>" alt="img" class='img-responsive' width='700' height='400'>
                            <hr>
                            <p><?php echo $post_content; ?></p>
                            <a href="#" class="btn btn-primary mb-5">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                        <?php endforeach; ?>
                  <?php  }
                } 
                ?>
                

               
               
               
            </div>
            <div class="col-md-4">

                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="" method="post">
                        <div class="input-group">
                            <input name="search" type="text" class="form-control">
                            <span class="input-group-btn">
                                <button name="submit" class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include 'components/footer.php'; ?>