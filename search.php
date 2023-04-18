<?php include 'components/header.php'; ?>
<?php

$sql = 'SELECT * FROM posts';
$select_posts = mysqli_query($conn, $sql);
// $posts = mysqli_fetch_all($select_posts, MYSQLI_ASSOC);

if (empty($posts)){
 echo "<p class='col-md-12 mt-3'>Empty posts</p>";
}



?>

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
                        foreach ($posts as $post) : ?>
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