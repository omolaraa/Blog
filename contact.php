<?php include 'components/header.php'; ?>
<?php

$name = $email = $body = '';
 $nameErr = $emailErr = $bodyErr = '';

 //Form submit
 if(isset($_POST['submit'])){

  //Validate name
  if(empty($_POST['name'])) {
    $nameErr = 'Name is required';
  }else{
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
  }
 
  //Validate email
  if(empty($_POST['email'])) {
    $emailErr = 'Email is required';
  }else{
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  }

  //Validate body
  if(empty($_POST['body'])) {
    $bodyErr = 'Feedback is required';
  }else{
    $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_SPECIAL_CHARS);
  }

  //Send form values to Mysql database:
    if(empty($nameErr) && empty($emailErr) && empty($bodyErr)){
      //Add to database
      $sql = "INSERT INTO `client_info` (name, email, body) VALUES ('$name', '$email', '$body')";
      $result = mysqli_query($conn, $sql);
      if(!$result){
        echo 'Error: ' . mysqli_error($conn);
      }
    }
 }
?>
<section class="cover-page bg-dark text-light p-5 p-lg-0 pt-lg-5 text-center text-sm-start" id="about">
      <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between">
          <div>
            <h1><span class="text-warning"> Contact Us </span></h1>
            <p class="lead my-4">
              We focus on teaching our students the fundamentals of the latest
              and greatest technologies to prepare them for their first dev role
            </p>
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
        <div class="row g-5">
          <div class="col-md">
            <h2 class="text-center mb-4">Contact Info</h2>
            <ul class="list-group list-group-flush lead">
              <li class="list-group-item">
                <span class="fw-bold">Main Location:</span> 50 Main st Boston MA
              </li>
              <li class="list-group-item">
                <span class="fw-bold">Enrollment Phone:</span> (555) 555-5555
              </li>
              <li class="list-group-item">
                <span class="fw-bold">Student Phone:</span> (333) 333-3333
              </li>
              <li class="list-group-item">
                <span class="fw-bold">Enrollment Email:</span> (555)
                enroll@frontendbc.test
              </li>
              <li class="list-group-item">
                <span class="fw-bold">Student Email:</span>
                student@frontendbc.test
              </li>
            </ul>
          </div>
          <div class="col-md">
          <h1 class="text-center">Get In Touch</h1>
          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="mt-4 w-75">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control <?php echo $nameErr? 'is-invalid' : null; ?>" id="name" name="name" placeholder="Enter your name">
        <div class="invalid-feedback">
          <?php echo $nameErr; ?>
        </div>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control <?php echo $emailErr? 'is-invalid' : null; ?>" id="email" name="email" placeholder="Enter your email">
        <div class="invalid-feedback">
          <?php echo $emailErr; ?>
        </div>
      </div>
      <div class="mb-3">
        <label for="body" class="form-label">Feedback</label>
        <textarea class="form-control <?php echo $bodyErr? 'is-invalid' : null; ?>" id="body" name="body" placeholder="Enter your feedback"></textarea>
        <div class="invalid-feedback">
          <?php echo $bodyErr; ?>
        </div>
      </div>
      <div class="mb-3">
        <input type="submit" name="submit" value="Send" class="btn btn-dark w-100">
      </div>
    </form>
          </div>
        </div>
      </div>
    </section>

    <?php include 'components/footer.php'; ?>
