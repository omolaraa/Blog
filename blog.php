<?php include 'components/header.php'; ?>
<?php

$sql = 'SELECT * FROM posts';
$select_posts = mysqli_query($conn, $sql);
$posts = mysqli_fetch_all($select_posts, MYSQLI_ASSOC);
 
?>

<section class="cover-page p-5 p-lg-0 pt-lg-5 mt-5">
    <div class="container-fluid">
        <div class="row">
            <?php if (empty($posts)) : ?>
                <p class="col-md-12 mt-3">Empty posts</p>
            <?php endif; ?>


            <div class="col-md-8 p-3">
                <?php foreach ($posts as $post) : ?>
                    <h1 class="page-header"> 
                        Page Heading
                        <small>Secondary Text</small>
                    </h1>
                    <h2><a href="#"><?php echo $post['post_title']; ?></a></h2>
                    <p class="lead">by <a href="index.php"><?php echo $post['post_author']; ?></a></p>
                    <p><span class="glyphicon glyphicon-time"></span>Posted on <?php echo $post['post_date']; ?> at 10:00 PM</p>
                    <hr>
                    <img src="images/<?php echo $post['post_image']; ?>" alt="img" class='img-responsive' width='700' height='400'>
                    <hr>
                    <p><?php echo $post['post_content']; ?></p>
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