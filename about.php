<?php include 'components/header.php'; ?>
<?php

$sql = 'SELECT * FROM instructors'; 
$result = mysqli_query($conn, $sql);
$instructors = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<section class="cover-page bg-dark text-light p-5 p-lg-0 pt-lg-5 text-center text-sm-start" id="about">
      <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between">
          <div>
            <h1>About <span class="text-warning"> Dev Bootcamp </span></h1>
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

    <section id="learn" class="p-5 bg-light text-dark">
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

    <section id="instructors" class="p-5 bg-dark">
      <div class="container">
        <h2 class="text-center text-white">Our Instructors</h2>
        <p class="lead text-center text-white mb-5">
          Our instructors all have 5+ years working as a web developer in the
          industry
        </p>
        <div class="row g-4">
        <?php if(empty($instructors)): ?>
      <p class="col-md-12 mt-3">There is no feedback</p>
    <?php endif; ?>

      <?php foreach ($instructors as $instructor) : ?>
          <div class="col-md-6 col-lg-3">
            <div class="card bg-light">
              <div class="card-body text-center">
                <img
                  src="<?php echo $instructor['image']; ?>"
                  class="rounded-circle mb-3"
                  alt=""
                />
                <h3 class="card-title mb-3"><?php echo $instructor['name']; ?></h3>
                <p class="card-text">
                <?php echo $instructor['bio']; ?>
                </p>
                <a href="#"><i class="bi bi-twitter text-dark mx-1"></i></a>
                <a href="#"><i class="bi bi-facebook text-dark mx-1"></i></a>
                <a href="#"><i class="bi bi-linkedin text-dark mx-1"></i></a>
                <a href="#"><i class="bi bi-instagram text-dark mx-1"></i></a>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          
         
        </div>
      </div>
    </section>

    <?php include 'components/footer.php'; ?>