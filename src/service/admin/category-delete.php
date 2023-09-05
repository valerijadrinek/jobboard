<?php
require dirname(__DIR__, 3) . "/api/admin-panel/layouts/header.php"; 

//checking for job_id
if (isset($_GET['id'])) {
    
    $category_id = $_GET['id'];
    $category_gateway = new AdminCategoriesAndJobs($database);
    $category_gateway->deleteCategory($category_id);

    header("location:" .ImportantConstants::ADMINURL."/categories-admins/show-categories.php");
}