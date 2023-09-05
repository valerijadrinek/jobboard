<?php
require __DIR__. "/includes/header.php"; 
require dirname(__DIR__) . "/src/service/user/users-listing-service.php";


?>

 <!-- HOME -->
 <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold"><?php echo $type; ?></h1>
            <div class="custom-breadcrumbs">
              <a href="<?php echo ImportantConstants::APPURL; ?>">Home</a> <span class="mx-2 slash">/</span>
              <a href="#"> Listing <?php echo $type; ?></a> 
            </div>
          </div>
        </div>
      </div>
 </section>

 <section class="site-section" style="background-color:rgba(0,0,0,0.48)">
    <div class="container">

        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2" style="color:white"><?php echo $users_count->{'user_count'};  ?> <?php echo $type; ?> Listed</h2>
          </div>
        </div>
        
        <ul class="job-listings mb-5">
          <?php foreach ( $users as $one_user) :  ?>
          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <a href="<?php echo ImportantConstants::APPURL; ?>profile.php?id=<?php echo $one_user->{'id'}; ?>"></a>
            <div class="job-listing-logo">
              <img src="users/users-images/<?php if(!empty($one_user->{'u_image'})) echo $one_user->{'u_image'}; elseif( $type == 'Company') echo 'No-logo.png'; else echo 'person_1.jpg';?>" alt="<?php echo $one_user->{'username'}; ?>" class="img-fluid">
            </div>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2><?php echo $one_user->{'username'}; ?></h2>
                <strong><?php echo $one_user->{'email'}; ?></strong>
              </div>
              <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25" >
                <?php if(!empty($one_user->{'bio'})) {echo substr($one_user->{'bio'}, 0, 60) . "...";} else  echo "No biography";
                 ?>
              </div>
              <div class="job-listing-location">
                <span class="btn btn-primary text-white"><?php if (($one_user->{'typeofemp'}) == 'Employee') {echo $one_user->{'title'}; }  
                    else {echo 'Click to see jobs';}?></span>
              </div>
            </div>
           <br>
        
          </li>
          
          <?php endforeach;  ?>
          
         </ul>

    </div>
</section>




<?php require __DIR__ . "/includes/footer.php";