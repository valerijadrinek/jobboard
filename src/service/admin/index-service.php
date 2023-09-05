<?php
if (!isset($_SESSION['admin_username'])) {
    header("location:" .ImportantConstants::ADMINURL."/admins/login-admins.php");
}

//initializing class for Admins
$admin_gateway = new AdminGateway($database);

//displaying counted categories, jobs and admins
$count_jobs = $admin_gateway->countJobs();
$count_categories = $admin_gateway->countCategories();
$count_admins = $admin_gateway->countAdmins();
