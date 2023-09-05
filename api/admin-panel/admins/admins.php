<?php require dirname(__DIR__) . "/layouts/header.php"; 
      require dirname(__DIR__,3) . "/src/service/admin/admin-service.php";
?>

    <div class="container-fluid" style="width: 60%;">

       <div class="row mt-5">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Admins</h5>
             <a  href="<?php echo ImportantConstants::ADMINURL; ?>/admins/create-admins.php" class="btn btn-success mb-4 text-center float-right">Create Admins</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">username</th>
                    <th scope="col">email</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($admins as $admin): ?>
                  <tr>
                    <th scope="row"><?php echo $admin->{'id'};  ?></th>
                    <td><?php echo $admin->{'a_username'};  ?></td>
                    <td><?php echo $admin->{'email'};  ?></td>
                   
                  </tr>
                  <?php endforeach; ?>
                 
                </tbody>
              </table>
              
            </div>
          </div>
        </div>
      </div>

   <?php require dirname(__DIR__) . "/layouts/footer.php"; ?>