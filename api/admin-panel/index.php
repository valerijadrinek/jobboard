<?php 
require __DIR__ . "/layouts/header.php";
require dirname(__DIR__,2) . "/src/service/admin/index-service.php";
  ?>

<div class="container">        
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              
              <h5 class="card-title">Jobs</h5>
              <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
              <p class="card-text">number of jobs: <?php echo $count_jobs->{'jobsCount'};  ?></p>
             
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Categories</h5>
              
              <p class="card-text">number of categories: <?php echo $count_categories->{'categoriesCount'};  ?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admins</h5>
              
              <p class="card-text">number of admins: <?php echo $count_admins->{'adminsCount'};  ?></p>
              
            </div>
          </div>
        </div>
      </div>
    
<?php  require __DIR__ . "/layouts/footer.php";
