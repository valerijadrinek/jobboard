<?php
//unsessioned users-access denied
if (!isset($_SESSION['admin_username'])) {
    header("location:" .ImportantConstants::ADMINURL."/admins/login-admins.php");
}

$admin_gateway = new AdminGateway($database);
$admins = $admin_gateway->fetchAllAdmins();