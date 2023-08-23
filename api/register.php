<?php require __DIR__ . "/includes/header.php";  ?>

<?php 
// unsession user - access denied
if(isset($_SESSION['username'])) {
  header("location: ". Database::APPURL ."");
} 


//form for registration
if(isset($_POST['submit'])) {

  //checking for empty values in form
  if ( empty($_POST['username']) OR empty($_POST['email']) OR empty($_POST['typeofe']) OR empty($_POST['password']) OR empty($_POST['repassword'])) {
    echo "<script>alert('Some of inputs are empty, please fill them out and try again.');</script>";
  } else {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $type_of_employer = $_POST['typeofe'];
    $upassword = $_POST['password'];
    $repassword = $_POST['repassword'];

    //checking for passwords to match
    if($upassword === $repassword) {

      $upassword = password_hash($upassword, PASSWORD_DEFAULT);

      $user = new UserGateway($database);
      $newUser = $user->getRegistered($username, $email, $type_of_employer, $upassword);

      if ( $newUser === false) {

        echo "<script>alert('Username or email are already existing!');</script>";

        header("location: ". Database::APPURL ."register.php");
        

        

      } else {

        header("location: ". Database::APPURL ."login.php");

      }

      

    } else {
      echo "<script>alert('Passwords are not matching!');</script>";
    }
  }
}

?>

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Register</h1>
            <div class="custom-breadcrumbs">
              <a href="#">Home</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Register</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-5">
            <form action="register.php" method="POST" class="p-4 border rounded">

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                <?php if( !isset($newUser)): ?>
                   <!-- <label class="" style="color:red" >Username or email are already existing</label><br> -->
                <?php endif; ?>
                 
                  <label class="text-black" for="username">Username</label> 
                  <input type="text" id="uname" class="form-control" placeholder="Username" name="username" autocomplete="given-name">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="email">Email</label>
                  <input type="email" id="email" class="form-control" placeholder="Email address" name="email" autocomplete="email">
                </div>
              </div>

              <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
               
                  <label class="text-black" for="typeofe">User type</label>
                  <select name="typeofe" class="selectpicker border rounded" data-style="btn-white btn-lg" data-width="100%" data-live-search="true" title="Select user type">
                     <option>Employee</option>
                     <option>Company</option>
                    
                  </select>
              </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="password">Password</label>
                  <input type="password" id="psw" class="form-control" placeholder="Password" name="password">
                </div>
              </div>

              <div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="repassword">Re-Type Password</label>
                  <input type="password" id="repass" class="form-control" placeholder="Re-type Password" name="repassword">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Sign Up" class="btn px-4 btn-primary text-white" name="submit">
                </div>
              </div>

            </form>
          </div>
      
        </div>
      </div>
    </section>
    
   <?php  require __DIR__ . "/includes/footer.php";  ?>