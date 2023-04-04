<?php include './admin-components/admin-header.php'; ?>

<section class="p-5">
    <div class="container p-5 d-flex justify-content-center">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="mt-5 w-50">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password">
            </div>
            <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="check">
    <label class="form-check-label" for="check">Remember me</label>
  </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</section>