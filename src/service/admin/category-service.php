<?php 

//unsessioned users-access denied
if (!isset($_SESSION['admin_username'])) {
    header("location:" .ImportantConstants::ADMINURL."/admins/login-admins.php");
}

$category_gateway = new AdminCategoriesAndJobs($database);

//categories-showing, updating
$category_show = $category_gateway->fetchAllCategories();

//creating new category
if (isset($_POST['create_submit'])) {

    if( empty($_POST['category_name'])) {
        echo "<script>alert('Empty input');</script>";
    } else {

        $category_name = $_POST['category_name'];
        $category_gateway->createCategory($category_name);

        header("location:" .ImportantConstants::ADMINURL."/categories-admins/show-categories.php");

    }




    

}