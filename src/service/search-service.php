<?php 
if(isset( $_POST['search_submit'])) {

    //checking for empty inputs
    if (empty($_POST['job_title']) OR empty($_POST['job_location']) OR empty($_POST['job_type'])) {
      echo "<script>alert('One or more inputs are empty');</script>";
    } else {

        //initializing variables
        $job_title = $_POST['job_title'];
        $job_location = $_POST['job_location'];
        $job_type = $_POST['job_type'];

        $job_searching = new JobSearching($database);
        $searched_jobs = $job_searching->searchJobs($job_title, $job_location, $job_type);
       

    }


} else {
    header("location:".ImportantConstants::APPURL."");
}