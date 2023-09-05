<?php
//checking for global job_id from query string
if (isset ($_GET['job_id'])) {
    $id = $_GET['job_id'];

    //job to display in single page
    $jobs_gateway = new JobGateway($database);
    $job = $jobs_gateway->fetchJobsByID($id);

    //fetching categories
    $categories = $jobs_gateway->fetchCategories();
    
    //related jobs
    $job_id = $job->{'id'};
    $job_category = $job->{'category'};

    $related_jobs = $jobs_gateway->getRelatedJobs($job_id, $job_category);

    //jobs_count
    $jobs_count = $jobs_gateway->countRelatedJobs($job_id, $job_category);


    //applying & saving a job
    $job_apply = new JobApplying($database);
    $job_save = new JobSaving($database);


    if(isset($_SESSION['user_id'])) {
     //checking for application of user and displaying button APPLY
     $worker_id = $_SESSION['user_id'];
    
     $job_application = $job_apply->checkUserApplication($worker_id, $id);

     $job_saved = $job_save->checkUserSavedJob($worker_id, $id);
    
    //applying for job
    if (isset($_POST['submit_application'])) {

        $job_apply->applyForJob($id);

    }
    
    

    //saving job
    if (isset($_POST['save_job'])) {

        $job_save->saveJob($id);

    } //deleting saved job
    elseif(isset($_POST['delete_job'])) {
        $job_save->deleteSavedJob($id, $worker_id);

    }

}  
    

} else {
 header("location: ". ImportantConstants::APPURL ."");
}
