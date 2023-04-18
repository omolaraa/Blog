<?php

include 'components/admin_header.php';

deleteCategory();
?>
 <?php include 'components/admin_nav.php'; ?>

<div class="container-fluid">
    <div class="row">

       
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class=" align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Categories</h1>
            </div>
            <div class="row">
                <div class="col">

                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="mb-3">
                        <div class="form-group mb-3">
                            <label for="cat_title" class="form-label">Add Catergory</label>
                        <?php
                        addCategory();
                        ?>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
                        </div>
                    </form>

                    <?php
                    if (isset($_GET['edit'])) {
                        $get_cat_id = $_GET['edit'];

                        include 'components/update_categories.php';
                    } ?> 

                </div>
                <div class="col">
                    <table class="table table-bordered table-hover">
                        <thread>
                            <tr>
                                <th>Id</th>
                                <th>Category Title</th>
                            </tr>
                        </thread>
                        <tbody>
                            <?php
                            displayCategories();
                            ?>
                        </tbody>
                    </table> 
                </div>
            </div>

       


<?php include 'components/admin_footer.php'; ?>