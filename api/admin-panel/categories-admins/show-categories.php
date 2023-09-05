<?php  
require dirname(__DIR__) . "/layouts/header.php";
require dirname(__DIR__, 3) . "/src/service/admin/category-service.php";
    
?>
    <div class="container-fluid">

          <div class="row mt-5" >
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Categories</h5>
             <a  href="<?php echo ImportantConstants::ADMINURL; ?>categories-admins/create-category.php" class="btn btn-success mb-4 text-center float-right">Create New Categories</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">update</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($category_show  as $category) : ?>
                  <tr>
                    <th scope="row"><?php echo $category->{'id'}; ?></th>
                    <td><?php echo $category->{'name'}; ?></td>
                    <td><a  href="<?php echo ImportantConstants::ADMINURL; ?>categories-admins/update-category.php?id=<?php echo $category->{'id'}; ?>" class="btn btn-warning text-white text-center">Update category</a></td>
                    <td><a href="<?php echo ImportantConstants::SRCURL; ?>src/service/admin/category-delete.php?id=<?php echo $category->{'id'}; ?>" class="btn btn-danger  text-center ">Delete </a></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>

      <?php  require dirname(__DIR__) . "/layouts/footer.php"; ?>

 