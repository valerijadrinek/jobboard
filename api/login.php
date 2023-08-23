<?php require __DIR__ . "/includes/header.php"; ?>

<?php
// session user - access denied
if(isset($_SESSION['username'])) {
  header("location: ". Database::APPURL ."");
}


//form for authentication
if(isset($_POST['submit'])) {

  //checking for empty values in form
  if ( empty($_POST['email']) OR empty($_POST['userpassword'])) {
    echo "<script>alert('Some of inputs are empty, please fill them out and try again.');</script>";
  } else {

    $email = $_POST['email'];
    $user_password = $_POST['userpassword'];

    //authentication
    $authentication = new UserGateway($database);
    $authentication->getAuthenticated($email, $user_password);

  }
}

?>
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('<?php echo Database::APPURL; ?>images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Log In</h1>
            <div class="custom-breadcrumbs">
              <a href="<?php echo Database::APPURL;  ?>">Home</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Log In</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section">
      <div class="container">
        <div class="row">
      
          <div class="col-md-12">
            <form action="login.php" method="post" class="p-4 border rounded">

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Email</label>
                  <input type="text" id="fname" class="form-control" name="email" placeholder="Email address">
                </div>
              </div>
              <div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="passw">Password</label>
                  <input type="password" id="passw" class="form-control" name="userpassword" placeholder="Password">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Log In" class="btn px-4 btn-primary text-white" name="submit">
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </section>
    
   <?php require __DIR__ . "/includes/footer.php"; ?>