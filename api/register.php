<?php 
   require __DIR__ . "/includes/header.php"; 
   require dirname(__DIR__) . "/src/service/user/register-service.php";
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