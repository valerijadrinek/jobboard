<?php  
require dirname(__DIR__, 2) . "/vendor/autoload.php";

//database credentials & database connection
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 2));
$dotenv->load();

$database = new Database($_ENV["DB_HOST"], $_ENV["DB_NAME"], $_ENV["DB_USER"], $_ENV["DB_PASS"] );

//handling errors
set_error_handler("ErrorHandler::handleError");
set_exception_handler("ErrorHandler::handleException");

//session starts
session_start();



 ?>
<!doctype html>
<html lang="en">
  <head>
    <title>JobBoard &mdash; Website Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Free-Template.co" />
    <link rel="shortcut icon" href="ftco-32x32.png">
    
    <link rel="stylesheet" href="css/custom-bs.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/line-icons/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/quill.snow.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">    
  </head>
  <body id="top">

  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
  
  
<!-- .site-mobile-menu -->
<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        Choose 
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body">
      
      </div>
   </div> 
    

    <!-- NAVBAR -->
    <header class="site-navbar mt-3">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="site-logo col-6"><a href="<?php echo ImportantConstants::APPURL;  ?>">JobBoard</a></div>

          <nav class="mx-auto site-navigation">
            <ul class="site-menu js-clone-nav  d-none d-md-block ml-0 pl-0">
              <li class=""><a href="<?php echo ImportantConstants::APPURL;  ?>" class="nav-link active">Home</a></li>
              <li><a href="<?php echo ImportantConstants::APPURL;   ?>about.php">About</a></li>
              
            
              <li class=""><a href="<?php echo ImportantConstants::APPURL; ?>contact.php">Contact</a></li>
              <li class=""> <a href="<?php echo ImportantConstants::APPURL; ?>users-listing.php?type=Company"><span class=""></span>Companies</a></li>
              <?php if(isset($_SESSION['username'])): ?>
                <?php if( isset($_SESSION['type_of_user']) AND $_SESSION['type_of_user'] === "Company"):  ?>
                  <li class="d-lg-inline "><a href="<?php echo ImportantConstants::APPURL; ?>users-listing.php?type=Employee"><span class="mr-2"></span>Employees</a></li>
                  <li class="d-lg-inline "><a href="<?php echo ImportantConstants::APPURL; ?>job-post.php"><span class="mr-2">+</span> Post a Job</a></li>
                <?php endif; ?>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"     aria-expanded="false">
                <?php echo $_SESSION['username']; ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item  " href="<?php echo ImportantConstants::APPURL;  ?>profile.php?id=<?php echo $_SESSION['user_id'] ?>">Public profile</a>
                  <a class="dropdown-item " href="<?php echo ImportantConstants::APPURL;  ?>profile-update.php?upd_id=<?php echo $_SESSION['user_id'] ?>">Update profile</a>
                  
                  <?php if( isset($_SESSION['type_of_user']) AND $_SESSION['type_of_user'] === "Employee"):  ?>

                   <a class="dropdown-item " href="<?php echo ImportantConstants::APPURL;  ?>job-saved.php?id=<?php echo $_SESSION['user_id'] ?>">Saved jobs</a>

                  <?php endif; ?>

                  <?php if( isset($_SESSION['type_of_user']) AND $_SESSION['type_of_user'] === "Company"):  ?>

                      <a class="dropdown-item " href="<?php echo ImportantConstants::APPURL;  ?>applicants-show.php?user_id=<?php echo $_SESSION['user_id'] ?>">Jobs Applicants</a>

                  <?php endif; ?>

                  <div class="dropdown-divider"></div>
                    <a class="dropdown-item " href="<?php echo ImportantConstants::SRCURL; ?>src/service/user/logout.php">Logout</a>
                </div>
              </li>
              
              
              <?php else: ?>
             
    
            </ul>
          </nav>
         
          
          <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
            <div class="ml-auto">
              
              <a href="<?php echo ImportantConstants::APPURL; ?>login.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block "><span class="mr-2 icon-lock_outline"></span>Log In</a>
              <a href="<?php echo ImportantConstants::APPURL;  ?>register.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block "><span class="mr-2 icon-lock_outline"></span>Register</a>
            </div>
            <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
          </div>
          <?php endif; ?>



        </div>
      </div>
    </header>