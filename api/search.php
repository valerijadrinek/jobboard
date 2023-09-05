<?php require __DIR__ . "/includes/header.php"; 
      require dirname(__DIR__) . "/src/service/search-service.php";
?>

<!-- HOME -->
<section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Search results for</h1>
            <div class="custom-breadcrumbs">
              <a href="<?php echo ImportantConstants::APPURL;  ?>">Home</a> <span class="mx-2 slash">/</span>
              <a href="">Job</a> <span class="mx-2 slash text-white"><?php echo $job_title; ?></span><span class="mx-2 slash text-white"> <?php echo $job_location; ?></span><span class="mx-2 slash text-white"> <?php echo $job_type; ?></span>
            </div>
          </div>
        </div>
      </div>
</section>


<!-- job listing section -->
<section class="site-section" style="background-color:rgba(0,0,0,0.48)">
      <div class="container">
      
        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2" style="color:white">Search results for <span class="text-success"><?php echo $job_title; ?> </span> <span><?php echo $job_location; ?></span> <span class="text-success"><?php echo $job_type; ?></span></h2>
          </div>
        </div>
        
        <ul class="job-listings mb-5">
        <?php if(count($searched_jobs) > 0): ?>
          <?php foreach ($searched_jobs as $job) :   ?>
          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <a href="<?php echo ImportantConstants::APPURL; ?>job-single.php?job_id=<?php echo $job->{'id'}; ?>"></a>
            <div class="job-listing-logo">
              <img src="users/users-images/<?php echo $job->{'company_image'};  ?>" alt="Free Website Template by Free-Template.co" class="img-fluid">
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
          <?php else: ?>
            
            <h2 style="color:red;text-align:center">There are no jobs that match your job search inputs yet!</h2>
        
    <?php endif; ?>  
        
        </ul>
       
      </div>
      </section>
      





<?php require __DIR__ . "/includes/footer.php"; ?>