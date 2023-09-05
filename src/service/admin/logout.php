<?php
require dirname(__DIR__, 3) . "/api/admin-panel/layouts/header.php";  


session_unset();
session_destroy();

header("location: ". ImportantConstants::ADMINURL ."admins/login-admins.php");