<?php

$sql = 'SELECT * FROM categories';
$select_categories = mysqli_query($conn, $sql);
$categories = mysqli_fetch_all($select_categories, MYSQLI_ASSOC);
?>

<div class="mb-5 mt-3"> 
    <h4>Blog Search</h4>
    <form action="search.php" method="post">
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

<div>
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">
            <?php foreach ($categories as $category) : ?>
                <li><a href="#"><?php echo $category['category_title']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
