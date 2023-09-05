<?php
if (isset($_GET['type'])) {

    $type = $_GET['type'];
    
    //fetching all users array sorted by type and number of returned rows
    $user_gateway = new UserGateway($database);
    $users = $user_gateway->fetchUserByType($type);
    $users_count = $user_gateway->countAllUsersByType($type);


} else {
    header("location:" . ImportantConstants::APPURL . "includes/404.php");
}