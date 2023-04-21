<?php

include 'components/admin_header.php';
include 'components/admin_nav.php';

?>


<div class="container-fluid">
    <div class="row">


        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class=" align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Comments</h1>
            </div>
           <?php
           if(isset($_GET['source'])){
            $source = $_GET['source'];
           }else{
            $source = '';
           }

           switch($source) {
            
            case 'add_post';
            include "components/add_post.php";
            break;

            case 'edit_post';
            include "components/edit_post.php";
            break;

            default:
            include "components/view_all_comments.php";
            break;

           }
           ?>

            <?php include 'components/admin_footer.php'; ?>