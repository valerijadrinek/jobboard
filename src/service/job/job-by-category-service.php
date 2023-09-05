<?php
//getting jobs by category
if (isset($_GET['name'])) {

    $name = $_GET['name'];

    $job_gateway = new JobGateway($database);
    $jobs = $job_gateway->fetchJobsByCategorie($name);
    

} else {
    header("location:" . ImportantConstants::APPURL . "includes/404.php");
}