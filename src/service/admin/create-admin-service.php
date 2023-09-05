<?php
//unsessioned users-access denied
if (!isset($_SESSION['admin_username'])) {
    header("location:" .ImportantConstants::ADMINURL."");
}

$admin_gateway = new AdminGateway($database);

  
  //form for registration
  if(isset($_POST['submit'])) {
  
    //checking for empty values in form
    if (empty($_POST['email']) OR empty($_POST['a_username']) OR empty($_POST['apassword']) ) {
      echo "<script>alert('Some of inputs are empty, please fill them out and try again.');</script>";
    } else {
   
      $email = $_POST['email'];
      $username = $_POST['a_username'];
      $apassword = password_hash($_POST['apassword'], PASSWORD_DEFAULT);;
     
  
      $newAdmin = $admin_gateway->createAdmin($username, $email, $apassword);
  
        if ( $newAdmin === false) {
  
          echo "<script>alert('Username or email already existing!');</script>";
  
          header("location: ". ImportantConstants::ADMINURL ."/admins/create-admins.php");
          
  
          
  
        } else {
  
          header("location: ". ImportantConstants::ADMINURL ."");
  
        }
  
        
  
      } 
    }