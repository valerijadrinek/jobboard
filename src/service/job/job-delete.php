<?php require dirname(__DIR__, 3) . "/api/includes/header.php"; 

//unauthorized access denied
if( isset($_SESSION['type_of_user']) AND $_SESSION['type_of_user'] !== "Company") {
    header("location: ". ImportantConstants::APPURL ."");
  }


//checking for job_id
if (isset($_GET['job_id'])) {
    
    $job_id = $_GET['job_id'];
    $jobs_gateway = new JobGateway($database);
    $jobs_gateway->deleteJobsByID($job_id);
    
    $sess_id = $_SESSION['user_id'];

    header("location: ". ImportantConstants::APPURL ."profile.php?id=$sess_id");

} else {
    header("location: ". ImportantConstants::APPURL ."");
}


 require ImportantConstants::APPURL . "includes/footer.php"; ?>

