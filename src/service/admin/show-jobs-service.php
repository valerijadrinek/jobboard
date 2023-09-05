<?php 
//unsessioned users-access denied
if (!isset($_SESSION['admin_username'])) {
    header("location:" .ImportantConstants::ADMINURL."/admins/login-admins.php");
}

$jobs_gateway = new AdminCategoriesAndJobs($database);

$jobs_show = $jobs_gateway->fetchAllJobs();