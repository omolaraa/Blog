<?php include 'components/header.php'; ?>
<?php

$sql = 'SELECT * FROM services'; 
$result = mysqli_query($conn, $sql);
$services = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<section class="cover-page bg-dark text-light p-5 p-lg-0 pt-lg-5 text-center text-sm-start" id="about">
      <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between">
          <div>
            <h1>What <span class="text-warning"> You'll Gain </span></h1>
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

    <section class="p-5">
      <div class="container">
      <div class="text-center pb-2">
      <h5>Our Services</h5>
      <h1>Tailored expertise for your success</h1>
    </div>
        <div class="row text-center g-4">
        <?php if(empty($services)): ?>
      <p class="col-md-12 mt-3">There is no feedback</p>
    <?php endif; ?>

      <?php foreach ($services as $service) : ?>
          <div class="col-md">
            <div class="card bg-dark text-light">
              <div class="card-body text-center">
                <div class="h1 mb-3">
                  <i class="<?php echo $service['icon']; ?>"></i>
                </div>
                <h3 class="card-title mb-3"><?php echo $service['name'];; ?></h3>
                <p class="card-text">
                <?php echo $service['description']; ?>
                </p>
                <a href="#" class="btn btn-primary">Read More</a>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        
        </div>
      </div>
    </section>

    <section class="partners bg-light text-secondary p-1">
    <div class="container">
    <div class="text-center py-3">
      <h5>Our Partners</h5>
      <h1>Top Companies For Our Students</h1>
    </div>
        <ul class="list-unstyled d-flex justify-content-evenly">
            <li><i class="fa-brands fa-youtube fa-xl"></i></li>
            <li><i class="fa-brands fa-wordpress fa-xl"></i></li>
            <li><i class="fa-brands fa-github fa-xl"></i></li>
            <li><i class="fa-brands fa-google fa-xl"></i></li>
            <li><i class="fa-brands fa-twitter fa-xl"></i></li>
        </ul>
      </div>
      </section>

    <?php include 'components/footer.php'; ?>