<?php
        if (isset($_POST['update_category'])) {
            $updated_cat_title = filter_input(INPUT_POST, 'updated_cat_title', FILTER_SANITIZE_SPECIAL_CHARS);

            if ($updated_cat_title == "" || empty($updated_cat_title)) {
                $updateErr = 'Updated title is required';
            } else {
                $query = "UPDATE categories SET category_title = '{$updated_cat_title}' WHERE category_id = {$get_cat_id}";
                $update_query = mysqli_query($conn, $query);

                if ($update_query) {
                    //Success
                    header('Location: categories.php');
                } else {
                    //Error
                    echo 'Error: ' . mysqli_error($conn);
                }
            }
        }

        ?>

<form action="" method="post" class="mb-3">
    <div class="form-group mb-3">
        <label for="updated_cat_title" class="form-label">Edit Catergory</label>
        <?php
        if (isset($_GET['edit'])) {
            $get_cat_id = $_GET['edit'];

            $query = "SELECT * FROM categories WHERE category_id = {$get_cat_id} ";
            $select_categories_id = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($select_categories_id)) {
                $cat_id = $row['category_id'];
                $cat_title = $row['category_title']; ?>

                <input value="<?php if (isset($cat_title)) {
                                    echo $cat_title;
                                } ?>" type="text" name="updated_cat_title" class="form-control <?php echo $updateErr ? 'is-invalid' : null; ?>">
                <div class="invalid-feedback">
                    <?php echo $updateErr; ?>
                </div>

        <?php }
        } ?>

    </div>
    <div class="form-group">
        <input type="submit" name="update_category" class="btn btn-primary" value="Update">
    </div>
</form>