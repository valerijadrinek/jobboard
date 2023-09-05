<?php
//fetching categories
$jobs_gateway = new JobGateway($database);
$categories = $jobs_gateway->fetchCategories();


//unauthorized access denied
if( isset($_SESSION['type_of_user']) AND $_SESSION['type_of_user'] !== "Company") {
  header("location: ". ImportantConstants::APPURL."");
}

  //form submition
  if (isset($_POST['submit'])) {

     //checking for important form submition fileds
    if(empty($_POST['job_title']) OR empty($_POST['job_location']) OR empty($_POST['job_model'])  OR empty($_POST['job_type']) OR empty($_POST['vacancy']) OR empty($_POST['experience']) OR empty($_POST['salary']) OR empty($_POST['gender']) OR empty($_POST['application_deadline']) 
    OR empty($_POST['job_description']) OR empty($_POST['responsibilities']) OR empty($_POST['company_id'])
    ) {

        echo "<script>alert('one or more inputs are empty')</script>";

      } else {
        
        $post_job = new JobGateway($database);
        $post_job->insertJobs();

        header("location: ". ImportantConstants::APPURL ."post-job.php");        

  }

  } else {
    header("location:" . ImportantConstants::APPURL . "includes/404.php");
  }