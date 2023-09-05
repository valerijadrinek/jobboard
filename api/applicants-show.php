<?php
require __DIR__ . "/includes/header.php"; 
require dirname(__DIR__) . "/src/service/job/applicants-show-service.php";
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
<?php  if ( isset($_SESSION['type_of_user']) AND $_SESSION['type_of_user'] === 'Company') :   ?>
  <?php if (isset($all_applicants)): ?>
   <?php foreach ($all_applicants as $one_applicant) : ?>
<section class="site-section mt-2 mb-2" style="background-color:rgba(0,0,0,0.48)">
    <div class="container">
      
        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2" style="color:white">Applicant for <strong class="text-success"> <?php echo $one_applicant->{'job_title'}; ?></strong></h2>
          </div>
        </div>
        
       
        <ul class="job-listings mb-5">
         
          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center mb-2">
            <a target="_blank" href="<?php echo ImportantConstants::APPURL; ?>profile.php?id=<?php echo $one_applicant->{'employee_id'}; ?>"></a>

            <div class="job-listing-logo">
              <img src="users/users-images/<?php echo $one_applicant->{'employee_image'}; ?>" alt="<?php echo $one_applicant->{'username'}; ?>" class="img-fluid">
            </div>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2><?php echo $one_applicant->{'username'}; ?></h2>
                <strong><?php echo $one_applicant->{'email'}; ?></strong>
              </div>
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <a class="btn btn-success text-white" style="position: relative;" href="<?php echo ImportantConstants::APPURL; ?>/users/users-cvs/<?php echo $one_applicant->{'cv'}; ?>" download>Download CV</a> 
              </div>
              
            </div>

          </li>
      
           
        </ul>
        
    
    </div>
</section>
<?php endforeach; ?>

<?php elseif (isset($applicants)) : ?>
  <section class="site-section" style="background-color:rgba(0,0,0,0.48)">
    <div class="container">
      
        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2" style="color:white">Applicants for <strong class="text-success"> <?php echo $job->{'job_title'}; ?></strong></h2>
          </div>
        </div>
        
       
        <ul class="job-listings mb-5">
          <?php foreach ($applicants as $applicant) :   ?>
          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center mb-2">
            <a target="_blank" href="<?php echo ImportantConstants::APPURL; ?>profile.php?id=<?php echo $applicant->{'employee_id'}; ?>"></a>

            <div class="job-listing-logo">
              <img src="users/users-images/<?php echo $applicant->{'employee_image'}; ?>" alt="<?php echo $applicant->{'username'}; ?>" class="img-fluid">
            </div>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2><?php echo $applicant->{'username'}; ?></h2>
                <strong><?php echo $applicant->{'email'}; ?></strong>
              </div>
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <a class="btn btn-success text-white" style="position: relative;" href="<?php echo ImportantConstants::APPURL; ?>/users/users-cvs/<?php echo $applicant->{'cv'}; ?>" download>Download CV</a> 
              </div>
              
            </div>

          </li>
      
          <?php endforeach; ?>   
        </ul>
        
    
    </div>
</section>

<?php endif; ?>
<?php endif; ?>

<?php require __DIR__ . "/includes/footer.php";  ?>


