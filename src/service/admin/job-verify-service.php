<?php
require dirname(__DIR__, 3) . "/api/admin-panel/layouts/header.php";

//unsessioned users-access denied
if (!isset($_SESSION['admin_username'])) {
    header("location:" .ImportantConstants::ADMINURL."admins/login-admins.php");
 }

 if(isset($_GET['job_id'])) {

    $job_id = $_GET['job_id'];

    $jobs_gateway = new AdminCategoriesAndJobs($database);
    $job = $jobs_gateway->fetchJobById($job_id);
 }