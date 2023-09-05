<?php

//checking for  id
if ( isset($_GET['id'])) {

    $id= $_GET['id'];
    
    //user data
    $user_gateway= new UserGateway($database);
    $user = $user_gateway->fetchUser($id);

    //jobs data
    $jobs_gateway = new JobGateway($database);
    $jobs = $jobs_gateway->fetchJobsByCompany($id);

  

} else {

  http_response_code(404);
  header("location: ". ImportantConstants::APPURL ."");
}