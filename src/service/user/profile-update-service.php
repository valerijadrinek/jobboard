<?php
// unsession user - access denied
if(!isset($_SESSION['username'])) {
    header("location: ". ImportantConstants::APPURL ."");
  } 
  
  //checking for update credentials
  if(isset($_GET['upd_id'])) {
  
      //extracting data from db about user for displaying them in form
      $id = $_GET['upd_id'];
  
      if( $_SESSION['user_id'] != $_GET['upd_id'] ) {
       header("location: ". ImportantConstants::APPURL ."");
       } 
  
      $user_gateway= new UserGateway($database);
      $user = $user_gateway->fetchUser($id);
  
         
     if (isset($_POST['submit'])) {
           //checking for fileds- username and email
          if( empty($_POST['username']) OR empty($_POST['email'])) {
              echo "<script>alert('Username or email are empty!');</script>";
  
          } else {
  
           //updating data for user
           $user_gateway->updateUser($id);
         
      }
  }
  
  } else {
      http_response_code(404);
      header("location: ". ImportantConstants::APPURL ."");
  }