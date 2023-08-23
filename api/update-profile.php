<?php require __DIR__ . "/includes/header.php"; ?>

<?php
// unsession user - access denied
if(!isset($_SESSION['username'])) {
  header("location: ". Database::APPURL ."");
} 

//checking for update credentials
if(isset($_GET['upd_id'])) {

    //extracting data from db about user for displaying them in form
    $id = $_GET['upd_id'];

    if( $_SESSION['user_id'] != $_GET['upd_id'] ) {
     header("location: ". Database::APPURL ."");
     } 

    $user_gateway= new UserGateway($database);
    $user = $user_gateway->fetchUser($id);

       
   if (isset($_POST['submit'])) {
         //checking for fileds- username and email
        if( empty($_POST['username']) OR empty($_POST['email'])) {
            echo "<script>alert('Username or email are empty!');</script>";

        } else {

         //updating data for user
         $user_gateway->updateUser($id);
       
    }
}

} else {
    http_response_code(404);
    header("location: ". Database::APPURL ."");
}
?>


<!-- HOME -->
<section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Update profile</h1>
            <div class="custom-breadcrumbs">
              <a href="<?php echo Database::APPURL;  ?>">Home</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong><?php echo $_SESSION['username'];   ?></strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>


<!-- Form section -->
<section class="site-section" >
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <form action="update-profile.php?upd_id=<?php echo $id; ?>" method="POST" class="" enctype="multipart/form-data">


              <!-- Basic informations -->
              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="username">Username</label>
                  <input type="text" id="username" name="username" class="form-control" value="<?php echo $user->{'username'}; ?>">
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="email">Email</label>
                  <input type="email" id="email" name="email" class="form-control" value="<?php echo $user->{'email'}; ?>">
                </div>
              </div>
             
              <?php  if ( isset($_SESSION['type_of_user']) AND $_SESSION['type_of_user'] === 'Employee') :   ?>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="title">Title</label> 
                  <input type="text" id="title" name="title" class="form-control" value="<?php echo $user->{'title'}; ?>">
                </div>
              </div>
              <?php else: ?>
                <div class="row form-group">
                <div class="col-md-12">
                  <input type="hidden" id="title" name="title" class="form-control" value="null">
                </div>
              </div>
              <?php endif;  ?>

             <!-- Biography -->
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="bio">Short Biography</label> 
                  <textarea name="bio" id="bio" cols="30" rows="7" class="form-control"   placeholder="Update biography...">
                  <?php echo $user->{'bio'}; ?>
                  </textarea>
                </div>
              </div>

              <!-- Social media -->
              <div class="row form-group">
               <div class="col-md-12">
                  <label class="text-black" for="facebook">Facebook link</label> 
                  <input type="text" id="facebook" name="facebook" class="form-control" value="<?php echo $user->{'facebook'}; ?>">
                </div>
              </div>

              <div class="row form-group">
               <div class="col-md-12">
                  <label class="text-black" for="twitter">Twitter link</label> 
                  <input type="text" id="twitter" name="twitter" class="form-control" value="<?php echo $user->{'twitter'}; ?>">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="linkedin">Linkedin link</label> 
                  <input type="text" id="linkedin" name="linkedin" class="form-control" value="<?php echo $user->{'linkedin'}; ?>">
                </div>
              </div>

              <!-- Updating files -->
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="u_image">Image</label> 
                  <input type="file" id="u_image" name="u_image" class="form-control" >
                </div>
              </div>


              <?php  if ( isset($_SESSION['type_of_user']) AND $_SESSION['type_of_user'] === 'Employee') :   ?>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="cv">CV</label> 
                  <input type="file" id="cv" name="cv" class="form-control">
                </div>
              </div>
              <?php else: ?>
                <div class="row form-group">
                <div class="col-md-12">
                  <input type="hidden" id="cv" value="null" name="cv" class="form-control">
                </div>
              </div>
              <?php  endif; ?>
              
              <!--Submit  -->
            <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Update profile" class="btn btn-primary btn-md text-white">
                </div>
              </div>

  
            </form>
          </div>
          <!-- Sidebar-->
          <div class="col-lg-5 ml-auto">
            <div class="p-4 mb-3 bg-white">
              <p class="mb-0 font-weight-bold">Update</p>
              <p class="mb-4">Update your profile on this page</p>

              <p class="mb-0 font-weight-bold">User public profile</p>
              <p class="mb-4"><a href="<?php echo $database::APPURL ?>profile.php?id=<?php echo $_SESSION['user_id'] ?>"><?php echo $user->{'username'}; ?></a></p>

              <p class="mb-0 font-weight-bold">Email Address</p>
              <p class="mb-0"><a href="<?php echo $database::APPURL ?>profile.php?id=<?php echo $_SESSION['user_id'] ?>"><?php echo $user->{'email'}; ?></a></p>

            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <?php require __DIR__ . "/includes/footer.php"; ?>