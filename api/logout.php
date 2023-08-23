<?php
require dirname(__DIR__ ). "../src/Database.php";

session_start();
session_unset();
session_destroy();

header("location: ". Database::APPURL ."");