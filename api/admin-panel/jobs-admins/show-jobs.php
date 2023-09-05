<?php 
   require dirname(__DIR__) . "/layouts/header.php";
   require dirname(__DIR__, 3) . "/src/service/admin/show-jobs-service.php";
?>
    <div class="container-fluid">

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Jobs</h5>
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">job title</th>
                    <th scope="col">category</th>
                    <th scope="col">company</th>
                    <th scope="col">status</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($jobs_show as $job):  ?>
                  <tr>
                    <th scope="row"><?php echo $job->{'id'}; ?></th>
                    <td><?php echo $job->{'job_title'}; ?> </td>
                    <td><?php echo $job->{'category'}; ?></td>
                    <td><?php echo $job->{'company_name'}; ?></td>
                     <td><a href="<?php echo ImportantConstants::ADMINURL; ?>jobs-admins/verify-jobs.php?job_id=<?php echo $job->{'id'};  ?>" class="btn btn-success  text-center ">Verify Job</a></td>
                     <td><a href="<?php echo ImportantConstants::SRCURL; ?>src/service/admin/job-delete-service.php?job_id=<?php echo $job->{'id'};  ?>" class="btn btn-danger  text-center ">Delete</a></td>
                  </tr>
                  <?php endforeach; ?>

                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>



<?php require dirname(__DIR__) . "/layouts/footer.php"; ?>