<?php
// session user - access denied
if(isset($_SESSION['username'])) {
    header("location: ". ImportantConstants::APPURL ."");
  }
  
  
  //form for authentication
  if(isset($_POST['submit'])) {
  
    //checking for empty values in form
    if ( empty($_POST['email']) OR empty($_POST['userpassword'])) {
      echo "<script>alert('Some of inputs are empty, please fill them out and try again.');</script>";
    } else {
  
      $email = $_POST['email'];
      $user_password = $_POST['userpassword'];
  
      //authentication
      $authentication = new UserGateway($database);
      $authentication->getAuthenticated($email, $user_password);
  
    }
  }