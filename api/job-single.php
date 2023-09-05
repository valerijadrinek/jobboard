
<?php 
   require __DIR__ . "/includes/header.php";
   require dirname(__DIR__) . "/src/service/job/job-single-service.php";
  ?>



    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold"><?php echo $job->{'job_title'};  ?></h1>
            <div class="custom-breadcrumbs">
              <a href="<?php echo ImportantConstants::APPURL; ?>">Home</a> <span class="mx-2 slash">/</span>
              <a href="<?php echo ImportantConstants::APPURL;  ?>job-single.php?job_id=<?php echo $job_id; ?>">Job</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong><?php echo $job->{'company_name'};  ?></strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    
    <section class="site-section" style="background-color:rgba(0,0,0,0.48)">
      <div class="container">
        <div class="row align-items-center mb-5">
          <div class="col-lg-8 mb-4 mb-lg-0">
            <div class="d-flex align-items-center">
              <div class="border p-2 d-inline-block mr-3 rounded">
                <img src="users/users-images/<?php echo $job->{'company_image'};  ?>" alt="<?php echo $job->{'job_title'};  ?>">
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
              <figure class="mb-5"><img src="images/job_single_img_1.jpg" alt="Image" class="img-fluid rounded"></figure>
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

            <!-- button for logging in for unlogged user -->
            <?php  if ( !isset($_SESSION['type_of_user'])): ?>
              <div class="row mb-5">
                  <div class="col-12">
                    <a href="<?php echo ImportantConstants::APPURL; ?>login.php"class="btn btn-block btn-success btn-md text-white">Log in to apply for a job</a>
                  </div>
              </div>

            <?php endif; ?>

        

            <!-- buttons for update & delete for companies-->
            <?php  if ( isset($_SESSION['type_of_user']) AND $_SESSION['type_of_user'] == 'Company') : ?>
              <?php if ( isset($_SESSION['user_id']) AND $_SESSION['user_id'] == $job->{'company_id'}) : ?>
                <div class="row mb-5">
                  <div class="col-6">
                    <a href="<?php echo ImportantConstants::APPURL;   ?>job-update.php?job_id=<?php echo $job->{'id'}; ?>"class="btn btn-block btn-light btn-md">Update Job</a>
                  </div>
                  <div class="col-6">
                    <a href="<?php echo ImportantConstants::SRCURL;   ?>src/service/job/job-delete.php?job_id=<?php echo $job->{'id'}; ?>" class="btn btn-block btn-danger btn-md">Delete</a>
                  </div>
                </div>

                <div class="row mb-5">
                  <div class="col-12">

                  <a class="btn btn-block btn-success btn-md" style="color:white" href="<?php echo ImportantConstants::APPURL; ?>applicants-show.php?user_id=<?php echo $_SESSION['user_id']; ?>&job_id=<?php echo $job_id; ?>">Applicants for job</a>


                  </div>
                </div>

            
                <?php endif; ?>
            <?php endif;  ?>

        
          <?php  if ( isset($_SESSION['type_of_user']) AND $_SESSION['type_of_user'] == 'Employee') : ?>
          <div class="row mb-6">


              <div class="col-6">
                <form  method="POST">
                    
                    <div class="form-group">
                      <input type="hidden" name="job_id" class="form-control" value="<?php echo $job_id; ?>">
                    </div>

                    <div class="form-group">
                     <input type="hidden" name="employee_id" class="form-control" value="<?php echo $_SESSION['user_id']; ?>" >
                    </div>
                  <?php  if ($job_saved == 0) :  ?>
                  <button name="save_job" type="submit"  class="btn btn-block btn-light btn-md"><i class="icon-heart"></i>Save Job</button>
                  <?php  else :?>
                  <button name="delete_job" type="submit" title="Click to unsave job" class="btn btn-block btn-light btn-md"><i class="icon-heart text-danger"></i>Saved Job</button>
                  <?php endif; ?>

              
                </form>
              </div>

              <!-- Form for appling for a job -->
              
              <div class="col-6">
              
                  <form class=""  method="POST">
                  
                  <div class="form-group">
                    <input type="hidden" name="username" class="form-control" value="<?php echo $_SESSION['username']; ?>" >
                  </div>

                  <div class="form-group">
                    <input type="hidden" name="email" class="form-control" value="<?php echo $_SESSION['email']; ?>" >
                  </div>

                  <div class="form-group">
                    <input type="hidden" name="cv" class="form-control" value="<?php echo $_SESSION['cv']; ?>" >
                  </div>

                  <div class="form-group">
                    <input type="hidden" name="employee_id" class="form-control" value="<?php echo $_SESSION['user_id']; ?>" >
                  </div>

                  <div class="form-group">
                    <input type="hidden" name="employee_image" class="form-control" value="<?php echo $_SESSION['image']; ?>" >
                  </div>

                  <div class="form-group">
                    <input type="hidden" name="job_id" class="form-control" value="<?php echo $job_id; ?>" >
                  </div>

                  <div class="form-group">
                    <input type="hidden" name="job_title" class="form-control" value="<?php echo $job->{'job_title'}; ?>" >
                  </div>

                  <div class="form-group">
                    <input type="hidden" name="company_id" class="form-control" value="<?php echo $job->{'company_id'}; ?>" >
                  </div>
                  <?php  if ($job_application == 0) :  ?>
                  <div class=" form-group">
                    <button  name="submit_application" type="submit" class="btn btn-block btn-primary btn-md" >Apply Now</button>
                  </div>
                </form>
                <?php else : ?>
                  <div class=" form-group">
                    <button  class="btn btn-block btn-primary btn-md" disabled >You already applied for this job</button>
                  </div>
                  <?php endif; ?>
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

            <!-- links to social media -->
            <div class="bg-light p-3 border rounded mb-4">
              <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Share</h3>
              <div class="px-3">
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo ImportantConstants::APPURL;  ?>job-single.php?job_id=<?php echo 
                $job->{'id'}; ?>=<?php echo $job->{'job_title'};  ?>" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                <a href="https://twitter.com/intent/tweet?text=<?php echo $job->{'job_title'}; ?>&url=<?php echo ImportantConstants::APPURL;  ?>job-single.php?job_id=<?php echo $job->{'id'}; ?>" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo ImportantConstants::APPURL; ?>job-single.php?job_id=<?php echo 
                $job->{'id'}; ?>" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
              </div>
            </div>

            <!-- Displaying categories -->
            <div class="bg-light p-3 border rounded mb-4">
              <h3 class="text-success mt-3 h5 pl-3 mb-3 ">Jobs by categories</h3>
              <ul class="list-unstyled pl-3 mb-0">
                <?php foreach ($categories as $category) : ?>
                 <a target="_blank" href="<?php echo ImportantConstants::APPURL; ?>job-by-category.php?name=<?php echo ucfirst($category->{'name'}); ?>" style="text-decoration: none;"><li class="mb-2"><?php echo ucfirst($category->{'name'}); ?> </li></a>
               <?php endforeach; ?>
              </ul>
            </div>

          </div>
        </div>
    </section>


    <!-- section for related jobs  -->
    <section class="site-section" id="next" style="background-color:rgba(0,0,0,0.48)">
      <div class="container">

        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2" style="color: white"><?php echo $jobs_count->{'job_count'}; ?> Related Jobs</h2>
          </div>
        </div>
        
        <ul class="job-listings mb-5">
          <?php foreach ($related_jobs as $related_job ): ?>
          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <a href="<?php echo ImportantConstants::APPURL; ?>job-single.php?job_id=<?php echo $related_job->{'id'}; ?>"></a>
            <div class="job-listing-logo">
              <img src="users/users-images/<?php echo $related_job->{'company_image'}; ?>" alt="<?php echo $related_job->{'company_name'}; ?>" class="img-fluid">
            </div>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2><?php echo $related_job->{'job_title'}; ?></h2>
                <strong><?php echo $related_job->{'company_name'}; ?></strong>
              </div>
              <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span> <?php echo $related_job->{'job_location'}; ?>
              </div>
              <div class="job-listing-meta">
                <span class="badge badge-<?php if (($related_job->{'job_type'}) == 'Part Time') {
                    echo 'danger';} else {echo 'success';}  ?>"><?php echo $related_job->{'job_type'}; ?></span>
              </div>
            </div>
            
          </li>
          <?php endforeach;  ?>
         </ul>

      </div>
    </section>
    
   <!-- section testimony  -->
    <section class="bg-light pt-5 testimony-full">
        
        <div class="owl-carousel single-carousel">

        
          <div class="container">
            <div class="row">
              <div class="col-lg-6 align-self-center text-center text-lg-left">
                <blockquote>
                  <p>&ldquo;Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae.&rdquo;</p>
                  <p><cite> &mdash; Corey Woods, @Dribbble</cite></p>
                </blockquote>
              </div>
              <div class="col-lg-6 align-self-end text-center text-lg-right">
                <img src="images/person_transparent_2.png" alt="Image" class="img-fluid mb-0">
              </div>
            </div>
          </div>

          <div class="container">
            <div class="row">
              <div class="col-lg-6 align-self-center text-center text-lg-left">
                <blockquote>
                  <p>&ldquo;Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae.&rdquo;</p>
                  <p><cite> &mdash; Chris Peters, @Google</cite></p>
                </blockquote>
              </div>
              <div class="col-lg-6 align-self-end text-center text-lg-right">
                <img src="images/person_transparent.png" alt="Image" class="img-fluid mb-0">
              </div>
            </div>
          </div>

      </div>

    </section>

    <!-- Section mobile app -->
    <section class="pt-5 bg-image overlay-primary fixed overlay" style="background-image: url('images/hero_1.jpg');">
      <div class="container">
        <div class="row">
          <div class="col-md-6 align-self-center text-center text-md-left mb-5 mb-md-0">
            <h2 class="text-white">Get The Mobile Apps</h2>
            <p class="mb-5 lead text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit tempora adipisci impedit.</p>
            <p class="mb-0">
              <a href="#" class="btn btn-dark btn-md px-4 border-width-2"><span class="icon-apple mr-3"></span>App Store</a>
              <a href="#" class="btn btn-dark btn-md px-4 border-width-2"><span class="icon-android mr-3"></span>Play Store</a>
            </p>
          </div>
          <div class="col-md-6 ml-auto align-self-end">
            <img src="images/apps.png" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </section>
    
   <?php require __DIR__ . "/includes/footer.php"; ?>