<?php
//unauthorized access denied
if( isset($_SESSION['type_of_user']) AND $_SESSION['type_of_user'] !== "Employee") {
    header("location: ". ImportantConstants::APPURL."");
  }

//displaying saved jobs
if(isset($_GET['id'])) {

    $id = $_GET['id'];

    if($_SESSION['user_id'] != $id ) {
        header("location: ". ImportantConstants::APPURL.""); 
    }

    $job_saving = new JobSaving($database);

    //fetching jobs to display them in ul
    $saved_jobs = $job_saving->fetchSavedJobs($id);

} else {
    header("location:" . ImportantConstants::APPURL . "includes/404.php");
}