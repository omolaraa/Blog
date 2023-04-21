<?php include 'components/header.php'; ?>


<section class="cover-page p-5 p-lg-0 pt-lg-5 mt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 p-3">

                <?php

               if(isset($_GET['category'])){
                $get_category_id = $_GET['category'];
               }

                $sql = "SELECT * FROM posts WHERE post_category_id = $get_category_id";
                $select_posts = mysqli_query($conn, $sql);
                $posts = mysqli_fetch_all($select_posts, MYSQLI_ASSOC);

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
            </div>
            <div class="col-md-4 p-3">
                <?php include 'components/sidebar.php'; ?>

            </div>

        </div>
    </div>
</section>

<?php include 'components/footer.php'; ?>