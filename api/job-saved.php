<?php
require __DIR__ . "/includes/header.php";
require dirname(__DIR__) . "/src/service/user/profile-service.php";
require dirname(__DIR__) . "/src/service/job/job-saved-service.php";
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


<!-- Job listing section -->
<?php  if ( isset($_SESSION['type_of_user']) AND $_SESSION['type_of_user'] === 'Employee') :   ?>
<section class="site-section" style="background-color:rgba(0,0,0,0.48)">
      <div class="container">
      
        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2" style="color:white">Saved jobs by <?php echo $user->{'username'}; ?></h2>
          </div>
        </div>
        
        <ul class="job-listings mb-5">
          <?php foreach ($saved_jobs as $saved_job) :   ?>
          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <a href="<?php echo ImportantConstants::APPURL; ?>job-single.php?job_id=<?php echo $saved_job->{'job_id'}; ?>"></a>
            <div class="job-listing-logo">
              <img src="users/users-images/<?php echo $saved_job->{'company_image'};  ?>" alt="Free Website Template by Free-Template.co" class="img-fluid">
            </div>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2><?php echo $saved_job->{'job_title'};   ?></h2>
                <strong><?php echo $saved_job->{'company_name'};   ?></strong>
              </div>
              <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span> <?php echo $saved_job->{'job_location'};   ?>
              </div>
              <div class="job-listing-meta">
                <span class="badge badge-<?php if (($saved_job->{'job_type'}) == 'Part Time') {
                    echo 'danger';} else {echo 'success';}  ?>"><?php echo $saved_job->{'job_type'};   ?></span>
              </div>
            </div>
            
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
</section>
<?php endif; ?>




<?php require __DIR__ . "/includes/footer.php"; ?>

