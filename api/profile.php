<?php 
  require __DIR__ . "/includes/header.php"; 
  require dirname(__DIR__) . "/src/service/user/profile-service.php";
  ?>


    <!-- Top image section -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('<?php echo ImportantConstants::APPURL;  ?>images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold"><?php echo $user->{'username'}; ?></h1>
            <div class="custom-breadcrumbs">
              <a href="<?php echo ImportantConstants::APPURL;   ?>">Home</a> <span class="mx-2 slash">/</span>
             
              <span class="text-white"><strong><?php echo $user->{'typeofemp'}; ?></strong></span>
              
            </div>
          </div>
        </div>
      </div>
  </section>


<!-- Public profile site section  -->
<section class="site-section overlay"  id="home-section" style="background-color:rgba(0,0,0,0.48)">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-md-7">
            <div class="card p-3 py-4">
                    
                    <div class="text-center">
                        <img src="users/users-images/<?php echo $user->{'u_image'};  ?>" width="100" class="rounded-circle">
                    </div>
                     
                    <div class="text-center mt-3">

                        <h4 class="mt-2 mb-2"><?php echo $user->{'username'};  ?></h4>

                        
                        <?php  if ( isset($_SESSION['type_of_user']) AND $_SESSION['type_of_user'] === 'Employee') :   ?>
                        <h5 class="mt-2 mb-1"><?php echo $user->{'title'}; ?></h5>
                        <a class="btn btn-primary text-white" href="<?php echo ImportantConstants::APPURL; ?>users/users-cvs/<?php echo $user->{'cv'}; ?>" role="button" download>Download CV</a>
                        <?php endif; ?>
                        
                        <div class="px-4 mt-1">
                            <p class="fonts"><?php echo $user->{'bio'}; ?></p>
                        
                        </div>
                        
                        <div class="px-3">
                    <a href="<?php  echo $user->{'facebook'};  ?>" class="pt-3 pb-3 pr-3 pl-0 underline-none"><span class="icon-facebook"></span></a>
                    <a href="<?php echo $user->{'twitter'};  ?>" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                    <a href="<?php echo $user->{'linkedin'};  ?>" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                </div>
                             
              </div>
                    
            </div>
          </div>
        </div>
      </div>
</section>


<!-- Job listing section -->
<?php  if ( isset($_SESSION['type_of_user']) AND $_SESSION['type_of_user'] === 'Company' AND $_SESSION['user_id'] == $id) :   ?>
<section class="site-section" style="background-color:rgba(0,0,0,0.48)">
      <div class="container">
      
        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2" style="color:white">Actual job demand by this company</h2>
          </div>
        </div>
        
        <ul class="job-listings mb-5">
          <?php foreach ($jobs as $job) :   ?>
          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <a href="<?php echo ImportantConstants::APPURL; ?>job-single.php?job_id=<?php echo $job->{'id'}; ?>"></a>
            <div class="job-listing-logo">
              <img src="users/users-images/<?php echo $user->{'u_image'};  ?>" alt="Free Website Template by Free-Template.co" class="img-fluid">
            </div>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2><?php echo $job->{'job_title'};   ?></h2>
                <strong><?php echo $job->{'company_name'};   ?></strong>
              </div>
              <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span> <?php echo $job->{'job_location'};   ?>
              </div>
              <div class="job-listing-meta">
                <span class="badge badge-<?php if (($job->{'job_type'}) == 'Part Time') {
                    echo 'danger';} else {echo 'success';}  ?>"><?php echo $job->{'job_type'};   ?></span>
              </div>
            </div>
            
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
</section>
<?php endif; ?>

<?php require __DIR__ . "/includes/footer.php"; ?>