
<?php 
   require __DIR__ . "/includes/header.php"; 
   require dirname(__DIR__) . "/src/service/job/job-post-service.php";
?>


    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold"><?php echo $_SESSION['username'];  ?></h1>
            <div class="custom-breadcrumbs">
              <a href="<?php echo ImportantConstants::APPURL; ?>">Home</a> <span class="mx-2 slash">/</span>
              <a href="<?php echo ImportantConstants::APPURL; ?>post-job.php">Job</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Post a Job</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Headline -->
    <section class="site-section">
      <div class="container">

        <div class="row align-items-center mb-5">
          <div class="col-lg-8 mb-4 mb-lg-0">
            <div class="d-flex align-items-center">
              <div>
               
                <h2>Post A Job</h2>
          
              </div>
            </div>
          </div>
         
        </div>

        <!-- Form -->
        <div class="row mb-5">
          <div class="col-lg-12">
            <form class="p-4 p-md-5 border rounded"   method="POST">
              <h3 class="text-black mb-5 border-bottom pb-2">Job Details</h3>
              
              
            <!-- Job description section -->
              <div class="form-group">
                <label for="job-title">Job Title</label>
                <input type="text" name="job_title" class="form-control" id="job-title" placeholder="Product Designer">
              </div>

              <div class="form-group">
                <label for="category">Job Category</label>
                <select name="category" class="selectpicker border rounded" id="category" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Job Category">
                  <?php foreach ($categories as $category): ?>
                  <option><?php echo $category->{'name'};  ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="form-group">
                <label for="job-location">Job Location</label>
                <select name="job_location" class="selectpicker border rounded" id="job-location" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Region">
                      <option>Anywhere</option>
                      <option>Zagreb</option>
                      <option>London</option>
                      <option>Berlin</option>
                      <option>Madrid</option>
                      <option>New York</option>
                      <option>Toronto</option>
                      <option>Sydney</option>
                      <option>Wienna</option>
                    </select>
              </div>

              <div class="form-group">
                <label for="job-work-model">Job Work Model</label>
                <select name="job_model" class="selectpicker border rounded" id="job-work-model" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Work Model">
                      <option>On-site</option>
                      <option>Hybrid</option>
                      <option>Remote</option>
                    </select>
              </div>


              <div class="form-group">
                <label for="job-type">Job Type</label>
                <select name="job_type" class="selectpicker border rounded" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Job Type">
                  <option>Part Time</option>
                  <option>Full Time</option>
                </select>
              </div>


              <div class="form-group">
                <label for="vacancy">Vacancy</label>
                <input name="vacancy" type="text" class="form-control" id="vacancy" placeholder="e.g. 3">
              </div>

              <div class="form-group">
                <label for="experience">Experience</label>
                <select name="experience" class="selectpicker border rounded" id="experience" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Years of Experience">
                  <option>1-3 years</option>
                  <option>3-6 years</option>
                  <option>6-9 years</option>
                  <option>9 and more</option>
                </select>
              </div>

              <div class="form-group">
                <label for="salary">Salary</label>
                <select name="salary" class="selectpicker border rounded" id="salary" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Salary">
                  <option>50 - 70&euro;</option>
                  <option>70 - 100&euro;</option>
                  <option>100 - 150&euro;</option>
                </select>
              </div>

              <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" class="selectpicker border rounded" id="gender" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Gender">
                  <option>Male</option>
                  <option>Female</option>
                  <option>Any</option>
                </select>
              </div>

              <div class="form-group">
                <label for="application_deadline">Application Deadline</label>
                <input name="application_deadline" type="date" class="form-control" id="application_deadline" placeholder="e.g. 20-12-2022">
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="job_description">Job Description</label> 
                  <textarea name="job_description" id="job_description" cols="30" rows="7" class="form-control" placeholder="Write Job Description..."></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="responsibilities">Responsibilities</label> 
                  <textarea name="responsibilities" id="responsibilities" cols="30" rows="7" class="form-control" placeholder="Write Responsibilities..."></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="education_experience">Education & Experience</label> 
                  <textarea name="education_experience" id="education_experience" cols="30" rows="7" class="form-control" placeholder="Write Education & Experience..."></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="other_benefits">Other Benifits</label> 
                  <textarea name="other_benefits" id="other_benefits" cols="30" rows="7" class="form-control" placeholder="Write Other Benifits..."></textarea>
                </div>
              </div>
            
             <!-- Company details -->
            
              <div class="form-group">
                <input type="hidden" value="<?php echo $_SESSION['email']; ?>"name="company_email" class="form-control" id="company_email" placeholder="Company Email">
              </div>
              <div class="form-group">
                <input type="hidden" name="company_name" value="<?php echo $_SESSION['username']; ?>" class="form-control" id="company_name" placeholder="Company Name">
              </div>
              <div class="form-group">
                <input type="hidden" name="company_id" value="<?php echo $_SESSION['user_id']; ?>" class="form-control" id="" placeholder="Company ID">
              </div>

              <div class="form-group">
                <input type="hidden" name="company_image" value="<?php echo $_SESSION['image']; ?>" class="form-control" id="" placeholder="Company Image">
              </div>

              <div class="col-lg-4 ml-auto">
                  <div class="row">  
                    <div class="col-6">
                      <input type="submit" name="submit" class="btn btn-block btn-primary btn-md" style="margin-left: 200px;" value="Save Job">
                    </div>
                  </div>
              </div>
              

            </form>
          </div>

         
        </div>
       
    </section>

    
    
   <?php require __DIR__ . "/includes/footer.php";  ?>