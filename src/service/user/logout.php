<?php
require dirname(__DIR__, 3) . "/api/includes/header.php";  


session_unset();
session_destroy();

header("location: ". ImportantConstants::APPURL ."");