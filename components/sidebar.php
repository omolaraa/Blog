<?php

$sql = 'SELECT * FROM categories';
$select_categories = mysqli_query($conn, $sql);
$categories = mysqli_fetch_all($select_categories, MYSQLI_ASSOC);
?>

<div class="mb-5 mt-3 bg-secondary p-4"> 
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

<div class="bg-secondary p-4">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">
            <?php foreach ($categories as $category) :
            $category_title = $category['category_title'];
            $category_id = $category['category_id'];
                 ?>
                <li><a href="category.php?category=<?php echo $category_id ?>" class="nav-link"><?php echo $category_title; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
