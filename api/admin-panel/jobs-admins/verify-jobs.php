<?php
  require dirname(__DIR__) . "/layouts/header.php";
  require dirname(__DIR__,3) . "/src/service/admin/job-verify-service.php";
 ?>

<section class="site-section" style="background-color:rgba(0,0,0,0.48)">
      <div class="container">
        <div class="row align-items-center mb-5">
          <div class="col-lg-8 mb-4 mb-lg-0">
            <div class="d-flex align-items-center">
              <div class="border p-2 d-inline-block mr-3 rounded">
                <img src="<?php echo ImportantConstants::APPURL; ?>users/users-images/<?php echo $job->{'company_image'};  ?>" alt="<?php echo $job->{'job_title'};  ?>">
              </div>
              <div>
                <h2 style="color:white"><?php echo $job->{'job_title'};  ?></h2>
                <div style="color:white">
                  <span class="ml-0 mr-2 mb-0"><span class="icon-briefcase mr-2"></span><?php echo $job->{'company_name'};  ?></span>
                  <span class="m-2"><span class="icon-room mr-2"></span><?php echo $job->{'job_location'};  ?> / <?php echo $job->{'job_model'};  ?></span>
                  <span class="m-2"><span class="icon-clock-o mr-2"></span><span class="text-primary"><?php echo $job->{'job_type'};  ?></span></span>
                </div>
              </div>
            </div>
          </div>
    
        <div class="row">
          <div class="col-lg-8">
            <div class="mb-4 bg-light border rounded p-3">
              <figure class="mb-5"><img src="<?php echo ImportantConstants::APPURL; ?>images/job_single_img_1.jpg" alt="Image" class="img-fluid rounded"></figure>
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-align-left mr-2"></span>Job Description</h3>
              <p ><?php echo $job->{'job_description'};  ?></p>
            </div>
            <div class="mb-5  bg-light border rounded mt-1 p-3">
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-rocket mr-2"></span>Responsibilities</h3>
              <p ><?php echo $job->{'responsibilities'};  ?></p>
            </div>

            <div class="mb-5  bg-light border rounded mt-1 p-3">
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-book mr-3"></span>Education + Experience</h3>
              <p><?php echo $job->{'education_experience'};  ?></p>
            </div>

            <div class="mb-5  bg-light border rounded mt-1 p-3">
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-turned_in mr-3"></span>Other Benifits</h3>
              <p><?php echo $job->{'other_benefits'};  ?></p>
            </div>

            <?php if ( isset($_SESSION['admin_username'])) : ?>
                <div class="row mb-5">
                  <div class="col-6">
                    <a href="<?php echo ImportantConstants::SRCURL;   ?>src/service/admin/job-status.php?job_id=<?php echo $job->{'id'}; ?>"class="btn btn-block btn-success btn-md" style="color:white">Publish job</a>
                  </div>
                  <div class="col-6">
                    <a href="<?php echo ImportantConstants::SRCURL;   ?>src/service/admin/job-delete-service.php?job_id=<?php echo $job->{'id'};  ?>" class="btn btn-block btn-danger btn-md">Delete</a>
                  </div>
                </div>

                <div class="row mb-5">
                  <div class="col-12">



                  </div>
                </div>

            
                <?php endif; ?>
          </div>

           <!-- aside section with short job informations-->
           <div class="col-lg-4">
            <!-- short informations about job -->
            <div class="bg-light p-3 border rounded mb-4">
              <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Job Summary</h3>
              <ul class="list-unstyled pl-3 mb-0">
                <li class="mb-2"><strong class="text-black">Published on:</strong>
                 <?php echo date('d', strtotime($job->{'created_at'})) . ' . ' . date('F', strtotime($job->{'created_at'})). ', '. 
                 date('Y', strtotime($job->{'created_at'})) ; ?></li>
                <li class="mb-2"><strong class="text-black">Vacancy:</strong> <?php echo $job->{'vacancy'}; ?></li>
                <li class="mb-2"><strong class="text-black">Employment Status:</strong> <?php echo $job->{'job_type'}; ?></li>
                <li class="mb-2"><strong class="text-black">Experience:</strong> <?php echo $job->{'experience'}; ?></li>
                <li class="mb-2"><strong class="text-black">Job Location:</strong> <?php echo $job->{'job_location'}; ?></li>
                <li class="mb-2"><strong class="text-black">Job Model:</strong> <?php echo $job->{'job_model'}; ?></li>
                <li class="mb-2"><strong class="text-black">Salary:</strong> <?php echo $job->{'salary'}; ?></li>
                <li class="mb-2"><strong class="text-black">Gender:</strong> <?php echo $job->{'gender'}; ?></li>
                <li class="mb-2"><strong class="text-black">Category:</strong> <?php echo $job->{'category'}; ?></li>
                <li class="mb-2"><strong class="text-black">Deadline:</strong> <?php echo date('d', strtotime($job->{'application_deadline'})) . ' . ' . date('F', strtotime($job->{'application_deadline'})). ', '. 
                 date('Y', strtotime($job->{'application_deadline'})) ; ?></li>
              </ul>
            </div>




<?php require dirname(__DIR__) . "/layouts/footer.php"; ?>


