<?php
//unauthorized access redirected to home page
if( isset($_SESSION['type_of_user']) AND $_SESSION['type_of_user'] !== "Company") {
    header("location: ". ImportantConstants::APPURL ."");
  }

if( $_SESSION['user_id'] != $_GET['user_id'] ) {
    header("location: ". ImportantConstants::APPURL ."");
   } 


  //showing applicants for job
  if(isset($_GET['user_id']))  {

    $user_id = $_GET['user_id'];
    
    //company user
    $user_gateway = new UserGateway($database);
    $user = $user_gateway->fetchUser($user_id);
     
    //fetching job for title
    $job_gateway = new JobGateway($database);
    
    
    $user_applicants = new UserApplicant($database);
    
    if(isset($_GET['job_id'])) {

   
    $job_id = $_GET['job_id'];
    $job = $job_gateway->fetchJobsByID($job_id);
   
    //applicants
    $applicants = $user_applicants->getApplicantsForJob($user_id, $job_id);
    
  } elseif (!isset($_GET['job_id'])) {

    $all_applicants = $user_applicants->getAllApplicants($user_id);

  }

} else {
  header("location:" . ImportantConstants::APPURL . "includes/404.php");
}
 