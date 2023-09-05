<?php
require __DIR__ . "/includes/header.php";
require dirname(__DIR__) . "/src/service/job/job-by-category-service.php";
?>

<!-- HOME -->
<section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Jobs in this category</h1>
            <div class="custom-breadcrumbs">
              <a href="<?php echo ImportantConstants::APPURL; ?>">Home</a> <span class="mx-2 slash">/</span>
              <a href="#">Job</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Category</strong></span>
            </div>
          </div>
        </div>
      </div>
 </section>

 <!-- section for jobs offer for choosen category -->
 <section class="site-section" id="next" style="background-color:rgba(0,0,0,0.48)">
      <div class="container">

        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2" style="color: white">Jobs within <i class="text-success"><?php echo $name; ?><i> category</h2>
          </div>
        </div>
        
        <ul class="job-listings mb-5">
          <?php foreach ($jobs as $job ): ?>
          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <a href="<?php echo ImportantConstants::APPURL; ?>job-single.php?job_id=<?php echo $job->{'id'}; ?>"></a>
            <div class="job-listing-logo">
              <img src="users/users-images/<?php echo $job->{'company_image'}; ?>" alt="<?php echo $job->{'company_name'}; ?>" class="img-fluid">
            </div>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2><?php echo $job->{'job_title'}; ?></h2>
                <strong><?php echo $job->{'company_name'}; ?></strong>
              </div>
              <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span> <?php echo $job->{'job_location'}; ?>
              </div>
              <div class="job-listing-meta">
                <span class="badge badge-<?php if (($job->{'job_type'}) == 'Part Time') {
                    echo 'danger';} else {echo 'success';}  ?>"><?php echo $job->{'job_type'}; ?></span>
              </div>
            </div>
            
          </li>
          <?php endforeach;  ?>
         </ul>

      </div>
    </section>


<?php require __DIR__ . "/includes/footer.php"; ?>