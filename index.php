<?php include 'components/header.php'; ?>
<?php

$sql = 'SELECT * FROM learning_modes'; 
$result = mysqli_query($conn, $sql);
$modes = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<section class="cover-page bg-dark text-light p-5 p-lg-0 pt-lg-5 text-center text-sm-start">
      <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between">
          <div>
            <h1>Become a <span class="text-warning"> Web Developer </span></h1>
            <p class="lead my-4">
              We focus on teaching our students the fundamentals of the latest
              and greatest technologies to prepare them for their first dev role
            </p>
            <button
              class="btn btn-primary btn-lg"
              data-bs-toggle="modal"
              data-bs-target="#enroll"
            >
              Start The Enrollment
            </button>
          </div>
          <img
            class="img-fluid w-50 d-none d-sm-block"
            src="images/homeImg.svg"
            alt=""
          />
        </div>
      </div>
    </section>

    <section class="bg-primary text-light p-5">
      <div class="container">
        <div class="d-md-flex justify-content-between align-items-center">
          <h3 class="mb-3 mb-md-0">Sign Up For Our Newsletter</h3>

          <div class="input-group news-input">
            <input type="text" class="form-control" placeholder="Enter Email" />
            <button class="btn btn-dark btn-lg" type="button">Submit</button>
          </div>
        </div>
      </div>
    </section>

    <section class="p-5">
      <div class="container">
        <div class="row text-center g-4">
        <?php if(empty($modes)): ?>
      <p class="col-md-12 mt-3">There is no feedback</p>
    <?php endif; ?>

      <?php foreach ($modes as $mode) : ?>
          <div class="col-md">
            <div class="card bg-dark text-light">
              <div class="card-body text-center">
                <div class="h1 mb-3">
                  <i class="<?php echo $mode['icon']; ?>"></i>
                </div>
                <h3 class="card-title mb-3"><?php echo $mode['mode']; ?></h3>
                <p class="card-text">
                <?php echo $mode['description']; ?>
                </p>
                <a href="#" class="btn btn-primary">Read More</a>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        
        </div>
      </div>
    </section>

    <section id="learn" class="p-5">
      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-md">
            <img src="images/homeImg.svg" class="img-fluid" alt="" />
          </div>
          <div class="col-md p-5">
            <h2>Learn The Fundamentals</h2>
            <p class="lead">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit.
              Similique deleniti possimus magnam corporis ratione facere!
            </p>
            <p>
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque
              reiciendis eius autem eveniet mollitia, at asperiores suscipit
              quae similique laboriosam iste minus placeat odit velit quos,
              nulla architecto amet voluptates?
            </p>
            <a href="#" class="btn btn-light mt-3">
              <i class="bi bi-chevron-right"></i> Read More
            </a>
          </div>
        </div>
      </div>
    </section>

    <section id="learn" class="p-5 bg-dark text-light">
      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-md p-5">
            <h2>Learn React</h2>
            <p class="lead">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit.
              Similique deleniti possimus magnam corporis ratione facere!
            </p>
            <p>
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque
              reiciendis eius autem eveniet mollitia, at asperiores suscipit
              quae similique laboriosam iste minus placeat odit velit quos,
              nulla architecto amet voluptates?
            </p>
            <a href="#" class="btn btn-light mt-3">
              <i class="bi bi-chevron-right"></i> Read More
            </a>
          </div>
          <div class="col-md">
            <img src="images/homeImg.svg" class="img-fluid" alt="" />
          </div>
        </div>
      </div>
    </section>

   

    
      <?php include 'components/footer.php'; ?>