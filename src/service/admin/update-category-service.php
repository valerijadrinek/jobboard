<?php
//unsessioned users-access denied
if (!isset($_SESSION['admin_username'])) {
    header("location:" .ImportantConstants::ADMINURL."/admins/login-admins.php");
}

//updating category
if (isset($_GET['id'])) {

    $cat_id = $_GET['id'];
    $category_gateway = new AdminCategoriesAndJobs($database);
    //displaying category name
    $display_category_name = $category_gateway->getCategory($cat_id);

    //updating category
    if(isset($_POST['update_submit'])) {

        if (empty($_POST['cat_name'])){
            echo "<script>alert('Empty input');</script>";
        } else {

            $cat_name = $_POST['cat_name'];
            $category_gateway->updateCategory($cat_id, $cat_name);

            header("location:" .ImportantConstants::ADMINURL."/categories-admins/show-categories.php");


        }


    }
} else {
    header("location:" .ImportantConstants::ADMINURL."/admins/login-admins.php");
}