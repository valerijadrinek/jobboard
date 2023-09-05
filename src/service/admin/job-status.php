<?php
require dirname(__DIR__,3) . "/api/admin-panel/layouts/header.php";
//unsessioned users-access denied
if (!isset($_SESSION['admin_username'])) {
   header("location:" .ImportantConstants::ADMINURL."admins/login-admins.php");
}


$jobs_gateway = new AdminCategoriesAndJobs($database);
 if(isset($_GET['job_id'])) {

    $job_id = $_GET['job_id'];
    $jobs_gateway->updateStatus($job_id);

    header("location:" .ImportantConstants::ADMINURL."/jobs-admins/show-jobs.php");
 }