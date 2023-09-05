<?php
//listing jobs service
$jobs_gateway = new JobGateway($database);
$jobs = $jobs_gateway->fetchJobsByStatus();
$jobs_count = $jobs_gateway->countAllJobsByStatus();

//search keywords service 
$job_searching = new JobSearching($database);
$trending_keywords = $job_searching->countKeywords();