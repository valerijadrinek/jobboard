<?php
//unauthorized access denied
if( isset($_SESSION['type_of_user']) AND $_SESSION['type_of_user'] !== "Company") {
    header("location: ". ImportantConstants::APPURL ."");
  }




//checking for job_id
if (isset($_GET['job_id'])) {
    
    $job_id = $_GET['job_id'];

    //categories
    $jobs_gateway = new JobGateway($database);
    $categories = $jobs_gateway->fetchCategories();

    //selecting fetch job
    $jobs = $jobs_gateway->fetchJobsByID($job_id);
    $company_id = $jobs->{'company_id'};
    

    if ( isset($_SESSION['user_id']) AND $_SESSION['user_id'] != $company_id) {

        echo "<script>alert('Unauthorized access');</script>";

        header("location: ". ImportantConstants::APPURL ."");

    } 


    if (isset($_POST['submit'])) {

            //checking for important form submition fileds
           if(empty($_POST['job_title']) OR empty($_POST['vacancy'])  OR empty($_POST['application_deadline']) 
           OR empty($_POST['job_description']) OR empty($_POST['responsibilities']) OR empty($_POST['company_id'])
           ) {
       
               echo "<script>alert('one or more inputs are empty')</script>"; 

           }   else {

             //updating jobs
    
             $jobs_gateway->updateJobsByID($job_id);
             
            
             $sess_id = $_SESSION['user_id'];

             header("location: ". ImportantConstants::APPURL ."profile.php?id=".$sess_id."");

           }
        
       
    }

} else {

    header("location: ". ImportantConstants::APPURL ."");
}
