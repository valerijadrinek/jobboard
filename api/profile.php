<?php require __DIR__ . "/includes/header.php"; ?>

<?php
//checking for  id
if ( isset($_GET['id'])) {

      $id= $_GET['id'];

      $user_gateway= new UserGateway($database);
      $user = $user_gateway->fetchUser($id);
    

} else {

    http_response_code(404);
    header("location: ". Database::APPURL ."");
}
?>


    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('<?php echo Database::APPURL; ?>images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold"><?php echo $user->{'username'}; ?></h1>
            <div class="custom-breadcrumbs">
              <a href="<?php echo Database::APPURL;  ?>">Home</a> <span class="mx-2 slash">/</span>
             
              <span class="text-white"><strong><?php echo $user->{'typeofemp'}; ?></strong></span>
              
            </div>
          </div>
        </div>
      </div>
    </section>


<!-- Site section  -->
<section class="site-section overlay"  id="home-section" style="background-color:silver">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-md-7">
            <div class="card p-3 py-4">
                    
                    <div class="text-center">
                        <img src="users/users-images/<?php echo $user->{'u_image'};  ?>" width="100" class="rounded-circle">
                    </div>
                     
                    <div class="text-center mt-3">

                        <h4 class="mt-2 mb-2"><?php echo $user->{'username'};  ?></h4>

                        
                        <?php  if ( isset($_SESSION['type_of_user']) AND $_SESSION['type_of_user'] === 'Employee') :   ?>
                        <h5 class="mt-2 mb-1"><?php echo $user->{'title'}; ?></h5>
                        <a class="btn btn-primary text-white" href="#" role="button" download="">Download CV</a>
                        <?php endif; ?>
                        
                        <div class="px-4 mt-1">
                            <p class="fonts"><?php echo $user->{'bio'}; ?></p>
                        
                        </div>
                        
                        <div class="px-3">
                    <a href="<?php  echo $user->{'facebook'};  ?>" class="pt-3 pb-3 pr-3 pl-0 underline-none"><span class="icon-facebook"></span></a>
                    <a href="<?php echo $user->{'twitter'};  ?>" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                    <a href="<?php echo $user->{'linkedin'};  ?>" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                </div>
                        
                    
                        
                    </div>
                    
                
                    
                    
                </div>
            </div>
        </div>

        
      </div>
</section>

<?php require __DIR__ . "/includes/footer.php"; ?>