<?php
// session user - access denied
if(isset($_SESSION['username'])) {
    header("location: ". ImportantConstants::APPURL ."");
  } 
  
  
  //form for registration
  if(isset($_POST['submit'])) {
  
    //checking for empty values in form
    if ( empty($_POST['username']) OR empty($_POST['email']) OR empty($_POST['typeofe']) OR empty($_POST['password']) OR empty($_POST['repassword'])) {
      echo "<script>alert('Some of inputs are empty, please fill them out and try again.');</script>";
    } else {
  
      $username = $_POST['username'];
      $email = $_POST['email'];
      $type_of_employer = $_POST['typeofe'];
      $upassword = $_POST['password'];
      $repassword = $_POST['repassword'];
  
      //checking for passwords to match
      if($upassword === $repassword) {
  
        $upassword = password_hash($upassword, PASSWORD_DEFAULT);
  
        $user = new UserGateway($database);
        $newUser = $user->getRegistered($username, $email, $type_of_employer, $upassword);
  
        if ( $newUser === false) {
  
          echo "<script>alert('Username or email are already existing!');</script>";
  
          header("location: ". ImportantConstants::APPURL ."register.php");
          
  
          
  
        } else {
  
          header("location: ". ImportantConstants::APPURL ."login.php");
  
        }
  
        
  
      } else {
        echo "<script>alert('Passwords are not matching!');</script>";
      }
    }
  }