<div class="container-fluid">
  <div class="row">
   
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
      <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              Dashboard
            </a>
          </li>

          <li class="nav-item">
          <a class="nav-link" href="#" data-bs-target="#posts-dropdown" data-bs-toggle="collapse">
            <i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i>
          </a>
          <ul class="collapse" id="posts-dropdown">
            <div><a class="nav-link" href="posts.php">View All Posts</a></div>
            <div><a class="nav-link" href="#">Add Posts</a></div>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="categories.php">
            <i class="fa fa-fw fa-wrench"></i> Categories
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-file"></i> Comments
          </a>
        </li>

          <li class="nav-item">
          <a class="nav-link" href="#" data-bs-target="#users-dropdown" data-bs-toggle="collapse">
            <i class="fa fa-fw fa-dashboard"></i> Users <i class="fa fa-fw fa-caret-down"></i>
          </a>
          <ul class="collapse" id="users-dropdown">
            <div><a class="nav-link" href="components/view_all_posts.php">View All Posts</a></div>
            <div><a class="nav-link" href="posts.php?source=add_post">Add Posts</a></div>
          </ul>
        </li>

          <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-user"></i> Profile
          </a>
        </li>

        </ul>
      </div>
    </nav>
