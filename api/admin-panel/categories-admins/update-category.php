<?php 
require dirname(__DIR__) . "/layouts/header.php";
require dirname(__DIR__, 3) . "/src/service/admin/update-category-service.php";
 ?>

    <div class="container">
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Update Categories</h5>
          <form method="POST">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="cat_name" id="form2Example1" class="form-control" placeholder="name"  value="<?php echo $display_category_name->{'name'}; ?>"/>
                 
                </div>

      
                <!-- Submit button -->
                <button type="submit" name="update_submit" class="btn btn-primary  mb-4 text-center">Update this category</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>

<?php require dirname(__DIR__) . "/layouts/footer.php"; ?>